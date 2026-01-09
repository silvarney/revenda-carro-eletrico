<?php get_header(); ?>

<?php while (have_posts()) : the_post();
	// Informações Básicas
	$preco = get_post_meta(get_the_ID(), '_rce_preco', true);
	$ano = get_post_meta(get_the_ID(), '_rce_ano', true);
	$km = get_post_meta(get_the_ID(), '_rce_km', true);
	$cor = get_post_meta(get_the_ID(), '_rce_cor', true);
	$placa = get_post_meta(get_the_ID(), '_rce_placa', true);
	$cidade = get_post_meta(get_the_ID(), '_rce_cidade', true);
	$estado = get_post_meta(get_the_ID(), '_rce_estado', true);
	
	// Especificações Técnicas
	$motor = get_post_meta(get_the_ID(), '_rce_motor', true);
	$potencia = get_post_meta(get_the_ID(), '_rce_potencia', true);
	$torque = get_post_meta(get_the_ID(), '_rce_torque', true);
	$bateria = get_post_meta(get_the_ID(), '_rce_bateria', true);
	$autonomia = get_post_meta(get_the_ID(), '_rce_autonomia', true);
	$tempo_carga = get_post_meta(get_the_ID(), '_rce_tempo_carga', true);
	$aceleracao = get_post_meta(get_the_ID(), '_rce_aceleracao', true);
	$velocidade_max = get_post_meta(get_the_ID(), '_rce_velocidade_max', true);
	$portas = get_post_meta(get_the_ID(), '_rce_portas', true);
	$lugares = get_post_meta(get_the_ID(), '_rce_lugares', true);
	$cambio = get_post_meta(get_the_ID(), '_rce_cambio', true);
	$tracao = get_post_meta(get_the_ID(), '_rce_tracao', true);
	
	// Opcionais
	$opcionais = get_post_meta(get_the_ID(), '_rce_opcionais', true);
	if (!is_array($opcionais)) $opcionais = array();
	?>

<div class="container" style="margin-top: 1rem;">
	<nav class="breadcrumb">
		<a href="<?php echo esc_url( home_url('/') ); ?>">Início</a> <span>/</span> <a href="<?php echo esc_url( get_post_type_archive_link('carros') ); ?>">Carros</a> <span>/</span> <?php the_title(); ?>
	</nav>
	<article style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
		<!-- Cabeçalho do Carro -->
		<div style="padding: 2rem; border-bottom: 1px solid var(--gray-light);">
			<div style="display: flex; justify-content: space-between; align-items: start; flex-wrap: wrap; gap: 1rem;">
				<div>
					<h1 style="margin: 0 0 0.5rem 0; color: var(--text);"><?php the_title(); ?></h1>
					<div style="display: flex; gap: 0.5rem; flex-wrap: wrap;">
						<?php
						$marcas = get_the_terms(get_the_ID(), 'marca-carro');
						if ($marcas) {
							foreach ($marcas as $marca) {
								echo '<span class="badge badge-primary">' . $marca->name . '</span>';
							}
						}
						$tipos = get_the_terms(get_the_ID(), 'tipo-carro');
						if ($tipos) {
							foreach ($tipos as $tipo) {
								echo '<span class="badge badge-secondary">' . $tipo->name . '</span>';
							}
						}
						?>
					</div>
				</div>
				<?php if ($preco) : ?>
					<div style="text-align: right;">
						<div style="font-size: 0.9rem; color: var(--gray); margin-bottom: 0.3rem;">Preço</div>
						<div style="font-size: 2.5rem; font-weight: 700; color: var(--primary);">
							R$ <?php echo number_format($preco, 2, ',', '.'); ?>
						</div>
					</div>
				<?php else : ?>
                    <span class="badge badge-secondary">Consultar</span>
                <?php endif; ?>
			</div>
		</div>

		<!-- Galeria de Imagens -->
		<div style="background: var(--bg);">
			<?php if (has_post_thumbnail()) : ?>
				<div style="text-align: center; padding: 2rem;">
					<?php the_post_thumbnail('large', array('style' => 'max-width: 100%; height: auto; border-radius: 8px;')); ?>
				</div>
			<?php else : ?>
				<div style="text-align: center; padding: 4rem;">
					<img src="https://via.placeholder.com/800x400/6E0AD6/FFFFFF?text=<?php echo urlencode(get_the_title()); ?>" 
					     alt="<?php the_title(); ?>" 
					     style="max-width: 100%; height: auto; border-radius: 8px;" />
				</div>
			<?php endif; ?>
		</div>

		<!-- Especificações -->
		<div style="padding: 2rem; background: var(--bg); border-top: 1px solid var(--gray-light); border-bottom: 1px solid var(--gray-light);">
			<h2 style="margin-top: 0; color: var(--text);">📊 Especificações Principais</h2>
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
				<?php if ($ano) : ?>
					<div class="spec-box">
						<div class="spec-icon">📅</div>
						<div class="spec-label">Ano</div>
						<div class="spec-value"><?php echo $ano; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($km) : ?>
					<div class="spec-box">
						<div class="spec-icon">🛣️</div>
						<div class="spec-label">Quilometragem</div>
						<div class="spec-value"><?php echo number_format((float)$km, 0, ',', '.'); ?> km</div>
					</div>
				<?php endif; ?>
				<?php if ($cor) : ?>
					<div class="spec-box">
						<div class="spec-icon">🎨</div>
						<div class="spec-label">Cor</div>
						<div class="spec-value"><?php echo $cor; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($portas) : ?>
					<div class="spec-box">
						<div class="spec-icon">🚪</div>
						<div class="spec-label">Portas</div>
						<div class="spec-value"><?php echo $portas; ?> portas</div>
					</div>
				<?php endif; ?>
				<?php if ($lugares) : ?>
					<div class="spec-box">
						<div class="spec-icon">👥</div>
						<div class="spec-label">Lugares</div>
						<div class="spec-value"><?php echo $lugares; ?> pessoas</div>
					</div>
				<?php endif; ?>
				<?php if ($cambio) : ?>
					<div class="spec-box">
						<div class="spec-icon">⚙️</div>
						<div class="spec-label">Câmbio</div>
						<div class="spec-value"><?php echo $cambio; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($tracao) : ?>
					<div class="spec-box">
						<div class="spec-icon">🔧</div>
						<div class="spec-label">Tração</div>
						<div class="spec-value"><?php echo $tracao; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($placa) : ?>
					<div class="spec-box">
						<div class="spec-icon">🔖</div>
						<div class="spec-label">Placa</div>
						<div class="spec-value"><?php echo strtoupper($placa); ?></div>
					</div>
				<?php endif; ?>
			</div>
			
			<h2 style="margin-top: 2rem; color: var(--text);">⚡ Desempenho e Bateria</h2>
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
				<?php if ($motor) : ?>
					<div class="spec-box">
						<div class="spec-icon">🔌</div>
						<div class="spec-label">Motor</div>
						<div class="spec-value"><?php echo $motor; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($potencia) : ?>
					<div class="spec-box">
						<div class="spec-icon">💪</div>
						<div class="spec-label">Potência</div>
						<div class="spec-value"><?php echo $potencia; ?> cv</div>
					</div>
				<?php endif; ?>
				<?php if ($torque) : ?>
					<div class="spec-box">
						<div class="spec-icon">⚡</div>
						<div class="spec-label">Torque</div>
						<div class="spec-value"><?php echo $torque; ?> Nm</div>
					</div>
				<?php endif; ?>
				<?php if ($bateria) : ?>
					<div class="spec-box">
						<div class="spec-icon">🔋</div>
						<div class="spec-label">Bateria</div>
						<div class="spec-value"><?php echo $bateria; ?> kWh</div>
					</div>
				<?php endif; ?>
				<?php if ($autonomia) : ?>
					<div class="spec-box">
						<div class="spec-icon">🌍</div>
						<div class="spec-label">Autonomia</div>
						<div class="spec-value"><?php echo $autonomia; ?> km</div>
					</div>
				<?php endif; ?>
				<?php if ($tempo_carga) : ?>
					<div class="spec-box">
						<div class="spec-icon">⏱️</div>
						<div class="spec-label">Tempo de Carga</div>
						<div class="spec-value"><?php echo $tempo_carga; ?></div>
					</div>
				<?php endif; ?>
				<?php if ($aceleracao) : ?>
					<div class="spec-box">
						<div class="spec-icon">🚀</div>
						<div class="spec-label">0-100 km/h</div>
						<div class="spec-value"><?php echo $aceleracao; ?>s</div>
					</div>
				<?php endif; ?>
				<?php if ($velocidade_max) : ?>
					<div class="spec-box">
						<div class="spec-icon">🏎️</div>
						<div class="spec-label">Vel. Máxima</div>
						<div class="spec-value"><?php echo $velocidade_max; ?> km/h</div>
					</div>
				<?php endif; ?>
			</div>
			
			<?php if (!empty($opcionais)) : ?>
			<h2 style="margin-top: 2rem; color: var(--text);">✨ Opcionais e Características</h2>
			<div class="features-grid">
				<?php foreach($opcionais as $opcional) : ?>
					<div class="feature-item">
						<span class="feature-check">✓</span>
						<span><?php echo esc_html($opcional); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
			<?php endif; ?>
		</div>

		<!-- Descrição -->
		<div style="padding: 2rem;">
			<h2 style="color: var(--text);">📝 Descrição</h2>
			<div style="line-height: 1.8; color: var(--text);">
				<?php the_content(); ?>
			</div>
		</div>

		<!-- Ações -->
		<div style="padding: 2rem; background: var(--bg); border-top: 1px solid var(--gray-light);">
			<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
				<a href="https://wa.me/5511999999999?text=Tenho interesse no <?php echo urlencode(get_the_title()); ?>" 
				   class="btn btn-success" 
				   target="_blank"
				   style="background: #25D366; color: white;">
					📱 Falar com Vendedor
				</a>
				<button class="btn btn-primary">❤️ Adicionar aos Favoritos</button>
				<button class="btn btn-outline">📊 Adicionar ao Comparador</button>
				<a href="<?php echo home_url('/carros'); ?>" class="btn btn-outline">← Voltar aos Carros</a>
			</div>
		</div>

        <!-- Barra fixa de contato -->
        <div class="sticky-contact">
            <div class="container">
                <span class="carro-card-location"><?php echo esc_html( trim( $cidade . ( $estado ? ', ' . $estado : '' ) ) ); ?></span>
                <a href="https://wa.me/5511999999999?text=Olá! Tenho interesse no <?php echo urlencode(get_the_title()); ?>" class="btn btn-secondary" target="_blank">WhatsApp</a>
                <a href="tel:+5511999999999" class="btn btn-outline">Ligar</a>
            </div>
        </div>
	</article>

	<!-- Carros Relacionados -->
	<?php
	$marcas = wp_get_post_terms(get_the_ID(), 'marca-carro', array('fields' => 'ids'));
	if ($marcas) {
		$relacionados = new WP_Query(array(
			'post_type' => 'carros',
			'posts_per_page' => 3,
			'post__not_in' => array(get_the_ID()),
			'tax_query' => array(
				array(
					'taxonomy' => 'marca-carro',
					'field' => 'term_id',
					'terms' => $marcas,
				)
			)
		));

		if ($relacionados->have_posts()) :
			?>
			<section style="margin: 3rem 0;">
				<h2 style="color: var(--text); font-size: 2rem;">🔍 Carros Similares</h2>
				<div class="carros-grid">
					<?php while ($relacionados->have_posts()) : $relacionados->the_post();
						$preco_rel = get_post_meta(get_the_ID(), '_rce_preco', true);
						$ano_rel = get_post_meta(get_the_ID(), '_rce_ano', true);
						$autonomia_rel = get_post_meta(get_the_ID(), '_rce_autonomia', true);
						?>
						<article class="carro-card">
							<?php if (has_post_thumbnail()) : ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
								</a>
							<?php else : ?>
								<a href="<?php the_permalink(); ?>">
									<img src="https://via.placeholder.com/400x200/FF6600/FFFFFF?text=<?php echo urlencode(get_the_title()); ?>" alt="<?php the_title(); ?>" />
								</a>
							<?php endif; ?>
							<div class="carro-card-content">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<?php if ($preco_rel) : ?>
									<div class="carro-price">R$ <?php echo number_format($preco_rel, 2, ',', '.'); ?></div>
								<?php endif; ?>
								<div class="carro-meta">
									<?php if ($ano_rel) : ?>
										<span>📅 <?php echo $ano_rel; ?></span>
									<?php endif; ?>
									<?php if ($autonomia_rel) : ?>
										<span>🔋 <?php echo $autonomia_rel; ?> km</span>
									<?php endif; ?>
								</div>
								<a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Ver Detalhes</a>
							</div>
						</article>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</section>
			<?php
		endif;
	}
	?>
</div>

<?php endwhile; ?>

<?php get_footer(); ?>
