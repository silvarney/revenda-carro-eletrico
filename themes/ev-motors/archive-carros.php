<?php 
get_header(); 

// Filtros de meta query
$meta_query = array('relation' => 'AND');

if (!empty($_GET['preco_min'])) {
	$meta_query[] = array('key' => '_rce_preco', 'value' => floatval($_GET['preco_min']), 'type' => 'NUMERIC', 'compare' => '>=');
}
if (!empty($_GET['preco_max'])) {
	$meta_query[] = array('key' => '_rce_preco', 'value' => floatval($_GET['preco_max']), 'type' => 'NUMERIC', 'compare' => '<=');
}
if (!empty($_GET['ano_min'])) {
	$meta_query[] = array('key' => '_rce_ano', 'value' => intval($_GET['ano_min']), 'type' => 'NUMERIC', 'compare' => '>=');
}
if (!empty($_GET['ano_max'])) {
	$meta_query[] = array('key' => '_rce_ano', 'value' => intval($_GET['ano_max']), 'type' => 'NUMERIC', 'compare' => '<=');
}
if (!empty($_GET['km_min'])) {
	$meta_query[] = array('key' => '_rce_km', 'value' => floatval($_GET['km_min']), 'type' => 'NUMERIC', 'compare' => '>=');
}
if (!empty($_GET['km_max'])) {
	$meta_query[] = array('key' => '_rce_km', 'value' => floatval($_GET['km_max']), 'type' => 'NUMERIC', 'compare' => '<=');
}
if (!empty($_GET['autonomia_min'])) {
	$meta_query[] = array('key' => '_rce_autonomia', 'value' => intval($_GET['autonomia_min']), 'type' => 'NUMERIC', 'compare' => '>=');
}
if (!empty($_GET['cor'])) {
	$meta_query[] = array('key' => '_rce_cor', 'value' => sanitize_text_field($_GET['cor']), 'compare' => 'LIKE');
}
if (!empty($_GET['portas'])) {
	$meta_query[] = array('key' => '_rce_portas', 'value' => sanitize_text_field($_GET['portas']), 'compare' => '=');
}

// Ordenação
$orderby = 'date';
$order = 'DESC';
$meta_key = '';

if (!empty($_GET['orderby'])) {
	if ($_GET['orderby'] == 'price_asc') {
		$orderby = 'meta_value_num';
		$meta_key = '_rce_preco';
		$order = 'ASC';
	} elseif ($_GET['orderby'] == 'price_desc') {
		$orderby = 'meta_value_num';
		$meta_key = '_rce_preco';
		$order = 'DESC';
	}
}

// Taxonomia
$tax_query = array();
if (!empty($_GET['marca'])) {
	$tax_query[] = array('taxonomy' => 'marca-carro', 'field' => 'slug', 'terms' => sanitize_text_field($_GET['marca']));
}

// Query customizada
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'carros',
	'posts_per_page' => 12,
	'paged' => $paged,
	's' => get_search_query(),
	'orderby' => $orderby,
	'order' => $order,
);

if (!empty($meta_key)) $args['meta_key'] = $meta_key;
if (count($meta_query) > 1) $args['meta_query'] = $meta_query;
if (!empty($tax_query)) $args['tax_query'] = $tax_query;

query_posts($args);
?>

<div class="container">
	<nav class="breadcrumb">
		<a href="<?php echo esc_url( home_url('/') ); ?>">Início</a> <span>/</span> Carros elétricos
	</nav>

	<div class="list-layout">
		<!-- Sidebar filtros -->
		<aside class="filters">
			<h3>Filtrar resultados</h3>
			<form method="get">
				<div class="filter-group">
					<label>Busca por palavra-chave</label>
					<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Ex: Tesla Model 3">
				</div>
				<div class="filter-group">
					<label>Marca</label>
					<select name="marca">
						<option value="">Todas</option>
						<?php
						$marcas = get_terms( array( 'taxonomy' => 'marca-carro', 'hide_empty' => false ) );
						foreach ( $marcas as $marca ) {
							$selected = ( isset($_GET['marca']) && $_GET['marca'] === $marca->slug ) ? 'selected' : '';
							echo '<option value="' . esc_attr($marca->slug) . '" ' . $selected . '>' . esc_html($marca->name) . '</option>';
						}
						?>
					</select>
				</div>
				<div class="filter-group">
					<label>Faixa de preço</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="preco_min" placeholder="Mín" value="<?php echo isset($_GET['preco_min']) ? esc_attr($_GET['preco_min']) : ''; ?>">
						<input type="number" name="preco_max" placeholder="Máx" value="<?php echo isset($_GET['preco_max']) ? esc_attr($_GET['preco_max']) : ''; ?>">
					</div>
				</div>
				<div class="filter-group">
					<label>Ano</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="ano_min" placeholder="De" value="<?php echo isset($_GET['ano_min']) ? esc_attr($_GET['ano_min']) : ''; ?>">
						<input type="number" name="ano_max" placeholder="Até" value="<?php echo isset($_GET['ano_max']) ? esc_attr($_GET['ano_max']) : ''; ?>">
					</div>
				</div>
				<div class="filter-group">
					<label>Quilometragem (km)</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="km_min" placeholder="Mín" value="<?php echo isset($_GET['km_min']) ? esc_attr($_GET['km_min']) : ''; ?>">
						<input type="number" name="km_max" placeholder="Máx" value="<?php echo isset($_GET['km_max']) ? esc_attr($_GET['km_max']) : ''; ?>">
					</div>
				</div>
				<div class="filter-group">
					<label>Autonomia mínima (km)</label>
					<input type="number" name="autonomia_min" placeholder="Ex: 300" value="<?php echo isset($_GET['autonomia_min']) ? esc_attr($_GET['autonomia_min']) : ''; ?>">
				</div>
				<div class="filter-group">
					<label>Cor</label>
					<input type="text" name="cor" placeholder="Ex: Branco" value="<?php echo isset($_GET['cor']) ? esc_attr($_GET['cor']) : ''; ?>">
				</div>
				<div class="filter-group">
					<label>Portas</label>
					<select name="portas">
						<option value="">Todas</option>
						<option value="2" <?php echo (isset($_GET['portas']) && $_GET['portas'] == '2') ? 'selected' : ''; ?>>2 portas</option>
						<option value="4" <?php echo (isset($_GET['portas']) && $_GET['portas'] == '4') ? 'selected' : ''; ?>>4 portas</option>
						<option value="5" <?php echo (isset($_GET['portas']) && $_GET['portas'] == '5') ? 'selected' : ''; ?>>5 portas</option>
					</select>
				</div>
				<div class="filter-group">
					<label>Ordenar por</label>
					<select name="orderby">
						<option value="date" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'date') ? 'selected' : ''; ?>>Mais recentes</option>
						<option value="price_asc" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price_asc') ? 'selected' : ''; ?>>Menor preço</option>
						<option value="price_desc" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'price_desc') ? 'selected' : ''; ?>>Maior preço</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary apply">Aplicar filtros</button>
			</form>
		</aside>

		<!-- Listagem -->
		<section>
			<header style="display:flex; justify-content:space-between; align-items:center;">
				<h1 style="margin:0;">Carros disponíveis</h1>
				<span style="color:var(--gray);"><?php echo (int) $wp_query->found_posts; ?> resultados</span>
			</header>

			<?php if ( have_posts() ) : ?>
				<div class="carros-grid">
					<?php while ( have_posts() ) : the_post();
						$preco = get_post_meta( get_the_ID(), '_rce_preco', true );
						$ano = get_post_meta( get_the_ID(), '_rce_ano', true );
						$km = get_post_meta( get_the_ID(), '_rce_km', true );
						$autonomia = get_post_meta( get_the_ID(), '_rce_autonomia', true );
						$cor = get_post_meta( get_the_ID(), '_rce_cor', true );
						$portas = get_post_meta( get_the_ID(), '_rce_portas', true );
						$cidade = get_post_meta( get_the_ID(), '_rce_cidade', true );
						$estado = get_post_meta( get_the_ID(), '_rce_estado', true );
					?>
					<article class="carro-card">
						<?php if ( has_post_thumbnail() ) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'carro-thumb' ); ?>
							</a>
						<?php else : ?>
							<a href="<?php the_permalink(); ?>">
								<img src="https://via.placeholder.com/400x200/6E0AD6/FFFFFF?text=<?php echo urlencode( get_the_title() ); ?>" alt="<?php the_title(); ?>">
							</a>
						<?php endif; ?>
						<div class="carro-card-content">
							<div class="carro-card-header">
								<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="carro-card-price">
									<?php if ( $preco ) : ?>
										<div class="carro-price">R$ <?php echo number_format( (float)$preco, 2, ',', '.' ); ?></div>
									<?php else : ?>
										<span class="badge badge-secondary">Consultar</span>
									<?php endif; ?>
								</div>
							</div>
							<div class="carro-card-location">
								<?php echo esc_html( trim( $cidade . ( $estado ? ', ' . $estado : '' ) ) ); ?>
							</div>
							<div class="carro-meta">
								<?php if ( $ano ) : ?><span>📅 <?php echo esc_html( $ano ); ?></span><?php endif; ?>
								<?php if ( $km ) : ?><span>🛣️ <?php echo number_format((float)$km, 0, ',', '.'); ?> km</span><?php endif; ?>
								<?php if ( $cor ) : ?><span>🎨 <?php echo esc_html( $cor ); ?></span><?php endif; ?>
								<?php if ( $portas ) : ?><span>🚪 <?php echo esc_html( $portas ); ?> portas</span><?php endif; ?>
								<?php if ( $autonomia ) : ?><span>🔋 <?php echo esc_html( $autonomia ); ?> km</span><?php endif; ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width:100%;">Ver detalhes</a>
						</div>
					</article>
					<?php endwhile; ?>
				</div>

				<div style="margin: 2rem 0; text-align:center;">
					<?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '← Anterior', 'next_text' => 'Próximo →' ) ); ?>
				</div>
			<?php else : ?>
				<div style="text-align:center; padding:2rem; background:white; border:1px solid var(--border); border-radius:8px;">
					Nenhum carro encontrado. Ajuste os filtros.
				</div>
			<?php endif; ?>
		</section>
	</div>
</div>

<?php get_footer(); ?>
