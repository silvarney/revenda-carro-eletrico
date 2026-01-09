<?php
/**
 * Template Name: Página de Estoque
 * Description: Template customizado para exibir todo o estoque de carros
 */

get_header(); 

// Construir meta query
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

// Construir tax query
$tax_query = array();
if (!empty($_GET['marca'])) {
	$tax_query[] = array('taxonomy' => 'marca-carro', 'field' => 'slug', 'terms' => sanitize_text_field($_GET['marca']));
}
if (!empty($_GET['tipo'])) {
	$tax_query[] = array('taxonomy' => 'tipo-carro', 'field' => 'slug', 'terms' => sanitize_text_field($_GET['tipo']));
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
	} elseif ($_GET['orderby'] == 'year_desc') {
		$orderby = 'meta_value_num';
		$meta_key = '_rce_ano';
		$order = 'DESC';
	}
}

// Query todos os carros
$paged = get_query_var('paged') ? get_query_var('paged') : 1;
$args = array(
	'post_type' => 'carros',
	'posts_per_page' => 24,
	'paged' => $paged,
	's' => get_search_query(),
	'orderby' => $orderby,
	'order' => $order,
);

if (!empty($meta_key)) $args['meta_key'] = $meta_key;
if (count($meta_query) > 1) $args['meta_query'] = $meta_query;
if (!empty($tax_query)) $args['tax_query'] = $tax_query;

$estoque_query = new WP_Query($args);
?>

<div class="container">
	<nav class="breadcrumb">
		<a href="<?php echo esc_url( home_url('/') ); ?>">Início</a> <span>/</span> <?php the_title(); ?>
	</nav>

	<!-- Hero da página -->
	<section style="background: linear-gradient(135deg, var(--primary) 0%, #5009b0 100%); border-radius: 12px; padding: 3rem; text-align: center; color: white; margin-bottom: 2rem;">
		<h1 style="margin: 0 0 1rem; font-size: 2.5rem;">🚗 Nosso Estoque Completo</h1>
		<p style="font-size: 1.2rem; opacity: 0.95; margin: 0 0 1.5rem;">
			<?php echo $estoque_query->found_posts; ?> carros elétricos disponíveis para você
		</p>
		<div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
			<a href="#filtros" class="btn btn-secondary">Filtrar Carros</a>
			<a href="https://wa.me/5511999999999?text=Gostaria de saber mais sobre o estoque" class="btn btn-outline" style="background: rgba(255,255,255,.2); border-color: white; color: white;">
				Falar com Vendedor
			</a>
		</div>
	</section>

	<div class="list-layout" id="filtros">
		<!-- Sidebar filtros -->
		<aside class="filters">
			<h3>🔍 Filtrar estoque</h3>
			<form method="get">
				<div class="filter-group">
					<label>Busca por palavra-chave</label>
					<input type="text" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="Ex: Tesla Model 3">
				</div>
				<div class="filter-group">
					<label>Marca</label>
					<select name="marca">
						<option value="">Todas as marcas</option>
						<?php
						$marcas = get_terms( array( 'taxonomy' => 'marca-carro', 'hide_empty' => true ) );
						foreach ( $marcas as $marca ) {
							$selected = ( isset($_GET['marca']) && $_GET['marca'] === $marca->slug ) ? 'selected' : '';
							echo '<option value="' . esc_attr($marca->slug) . '" ' . $selected . '>' . esc_html($marca->name) . ' (' . $marca->count . ')</option>';
						}
						?>
					</select>
				</div>
				<div class="filter-group">
					<label>Tipo de veículo</label>
					<select name="tipo">
						<option value="">Todos os tipos</option>
						<?php
						$tipos = get_terms( array( 'taxonomy' => 'tipo-carro', 'hide_empty' => true ) );
						foreach ( $tipos as $tipo ) {
							$selected = ( isset($_GET['tipo']) && $_GET['tipo'] === $tipo->slug ) ? 'selected' : '';
							echo '<option value="' . esc_attr($tipo->slug) . '" ' . $selected . '>' . esc_html($tipo->name) . '</option>';
						}
						?>
					</select>
				</div>
				<div class="filter-group">
					<label>Faixa de preço (R$)</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="preco_min" placeholder="Mínimo" value="<?php echo isset($_GET['preco_min']) ? esc_attr($_GET['preco_min']) : ''; ?>">
						<input type="number" name="preco_max" placeholder="Máximo" value="<?php echo isset($_GET['preco_max']) ? esc_attr($_GET['preco_max']) : ''; ?>">
					</div>
				</div>
				<div class="filter-group">
					<label>Ano de fabricação</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="ano_min" placeholder="De" value="<?php echo isset($_GET['ano_min']) ? esc_attr($_GET['ano_min']) : ''; ?>">
						<input type="number" name="ano_max" placeholder="Até" value="<?php echo isset($_GET['ano_max']) ? esc_attr($_GET['ano_max']) : ''; ?>">
					</div>
				</div>
				<div class="filter-group">
					<label>Quilometragem (km)</label>
					<div style="display:grid; grid-template-columns:1fr 1fr; gap:.5rem;">
						<input type="number" name="km_min" placeholder="Mínimo" value="<?php echo isset($_GET['km_min']) ? esc_attr($_GET['km_min']) : ''; ?>">
						<input type="number" name="km_max" placeholder="Máximo" value="<?php echo isset($_GET['km_max']) ? esc_attr($_GET['km_max']) : ''; ?>">
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
						<option value="year_desc" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'year_desc') ? 'selected' : ''; ?>>Mais novos</option>
					</select>
				</div>
				</div>
				<button type="submit" class="btn btn-primary apply">Aplicar filtros</button>
				<a href="<?php echo get_permalink(); ?>" class="btn btn-outline" style="width:100%; text-align:center;">Limpar filtros</a>
			</form>
		</aside>
						<option value="km_asc" <?php echo (isset($_GET['orderby']) && $_GET['orderby'] == 'km_asc') ? 'selected' : ''; ?>>Menor KM</option>
					</select>
				</div>
				<button type="submit" class="btn btn-primary apply">Aplicar filtros</button>
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-outline" style="width: 100%; text-align: center; margin-top: 0.5rem;">Limpar filtros</a>
			</form>
		</aside>

		<!-- Listagem de carros -->
		<section>
			<header style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 1.5rem;">
				<div>
					<h2 style="margin:0; font-size: 1.5rem;">Carros disponíveis</h2>
					<p style="margin: 0.3rem 0 0; color: var(--gray); font-size: 0.95rem;">
						<?php echo $estoque_query->found_posts; ?> veículos encontrados
					</p>
				</div>
			</header>

			<?php if ( $estoque_query->have_posts() ) : ?>
				<div class="carros-grid">
					<?php while ( $estoque_query->have_posts() ) : $estoque_query->the_post();
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
								<h3 style="margin: 0 0 0.3rem; font-size: 1.1rem;">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
							</div>
							<?php if ($cidade || $estado) : ?>
								<div class="carro-card-location" style="margin-bottom: 0.5rem;">
									📍 <?php echo esc_html( trim( $cidade . ( $estado ? ', ' . $estado : '' ) ) ); ?>
								</div>
							<?php endif; ?>
							<div class="carro-meta" style="margin: 0.8rem 0;">
								<?php if ( $ano ) : ?><span>📅 <?php echo esc_html( $ano ); ?></span><?php endif; ?>
								<?php if ( $km ) : ?><span>🛣️ <?php echo number_format((float)$km, 0, ',', '.'); ?> km</span><?php endif; ?>
								<?php if ( $cor ) : ?><span>🎨 <?php echo esc_html( $cor ); ?></span><?php endif; ?>
								<?php if ( $portas ) : ?><span>🚪 <?php echo esc_html( $portas ); ?> portas</span><?php endif; ?>
								<?php if ( $autonomia ) : ?><span>🔋 <?php echo esc_html( $autonomia ); ?> km</span><?php endif; ?>
							</div>
							<?php if ( $preco ) : ?>
								<div class="carro-price" style="margin: 1rem 0;">R$ <?php echo number_format( (float)$preco, 2, ',', '.' ); ?></div>
							<?php else : ?>
								<div style="margin: 1rem 0;"><span class="badge badge-secondary">Consultar preço</span></div>
							<?php endif; ?>
							<div style="display: grid; grid-template-columns: 1fr auto; gap: 0.5rem;">
								<a href="<?php the_permalink(); ?>" class="btn btn-primary">Ver detalhes</a>
								<button class="btn btn-outline" style="padding: 12px;" title="Adicionar aos favoritos" onclick="alert('Recurso em desenvolvimento')">♥</button>
							</div>
						</div>
					</article>
					<?php endwhile; ?>
				</div>

				<!-- Paginação -->
				<div style="margin: 3rem 0; text-align:center;">
					<?php 
					echo paginate_links( array(
						'total' => $estoque_query->max_num_pages,
						'current' => $paged,
						'mid_size' => 2,
						'prev_text' => '← Anterior',
						'next_text' => 'Próximo →',
					) ); 
					?>
				</div>
			<?php else : ?>
				<div style="text-align:center; padding:3rem 2rem; background:white; border:1px solid var(--border); border-radius:8px;">
					<div style="font-size: 3rem; margin-bottom: 1rem;">🔍</div>
					<h3 style="color: var(--text); margin: 0 0 0.5rem;">Nenhum carro encontrado</h3>
					<p style="color: var(--gray);">Tente ajustar os filtros ou <a href="<?php echo esc_url( get_permalink() ); ?>">limpar todos os filtros</a></p>
				</div>
			<?php endif; 
			wp_reset_postdata();
			?>
		</section>
	</div>
</div>

<!-- CTA Final -->
<section style="background: var(--bg); padding: 3rem 0; margin-top: 4rem;">
	<div class="container" style="text-align: center;">
		<h2 style="margin: 0 0 1rem;">Não encontrou o carro ideal?</h2>
		<p style="color: var(--gray); margin: 0 0 2rem;">Entre em contato com nossa equipe e encontraremos o veículo perfeito para você!</p>
		<div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
			<a href="https://wa.me/5511999999999?text=Olá! Não encontrei o carro que procuro no estoque" class="btn btn-success" style="background: #25D366;">
				📱 Falar no WhatsApp
			</a>
			<a href="tel:+5511999999999" class="btn btn-primary">
				📞 Ligar agora
			</a>
			<a href="<?php echo home_url('/contato'); ?>" class="btn btn-outline">
				✉️ Enviar mensagem
			</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
