<?php get_header(); ?>

<?php if (is_front_page() || is_home()) : ?>
<!-- Hero Section -->
<section class="hero">
	<div class="container">
		<h1>🚗⚡ Carros Elétricos do Futuro</h1>
		<p>Encontre o carro elétrico perfeito para você. Economia, sustentabilidade e tecnologia.</p>
		<div style="display:flex; gap:1rem; justify-content:center; flex-wrap:wrap;">
			<a href="<?php echo home_url('/estoque'); ?>" class="btn btn-secondary">🚗 Ver Estoque Completo</a>
			<a href="<?php echo home_url('/contato'); ?>" class="btn btn-outline" style="background:rgba(255,255,255,.2); border-color:white; color:white;">📞 Falar com Vendedor</a>
		</div>
	</div>
</section>
<?php endif; ?>

<div class="container">
	<!-- Search Section -->
	<section class="search-section">
		<h2>🔍 Encontre seu Carro Ideal</h2>
		<form class="search-form" method="get" action="<?php echo home_url('/carros'); ?>">
			<input type="text" name="s" placeholder="Marca, modelo..." />
			<select name="marca">
				<option value="">Todas as Marcas</option>
				<option value="tesla">Tesla</option>
				<option value="byd">BYD</option>
				<option value="nissan">Nissan</option>
				<option value="chevrolet">Chevrolet</option>
			</select>
			<select name="ano">
				<option value="">Todos os Anos</option>
				<option value="2024">2024</option>
				<option value="2023">2023</option>
				<option value="2022">2022</option>
			</select>
			<button type="submit" class="btn btn-primary">Buscar</button>
		</form>
	</section>

	<!-- Carros em Destaque -->
	<section>
		<h2 style="margin-top: 3rem; font-size: 2rem; color: var(--text);">⭐ Carros em Destaque</h2>
		<div class="carros-grid">
			<?php
			$carros = new WP_Query(array(
				'post_type' => 'carros',
				'posts_per_page' => 6,
				'orderby' => 'date',
				'order' => 'DESC'
			));
			
			if ($carros->have_posts()) :
				while ($carros->have_posts()) : $carros->the_post();
					$preco = get_post_meta(get_the_ID(), '_rce_preco', true);
					$ano = get_post_meta(get_the_ID(), '_rce_ano', true);
					$autonomia = get_post_meta(get_the_ID(), '_rce_autonomia', true);
					?>
					<article class="carro-card">
						<?php if (has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('medium'); ?>
							</a>
						<?php else : ?>
							<a href="<?php the_permalink(); ?>">
								<img src="https://via.placeholder.com/400x200/6E0AD6/FFFFFF?text=<?php echo urlencode(get_the_title()); ?>" alt="<?php the_title(); ?>" />
							</a>
						<?php endif; ?>
						<div class="carro-card-content">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<?php if ($preco) : ?>
								<div class="carro-price">R$ <?php echo number_format($preco, 2, ',', '.'); ?></div>
							<?php endif; ?>
							<div class="carro-meta">
								<?php if ($ano) : ?>
									<span>📅 <?php echo $ano; ?></span>
								<?php endif; ?>
								<?php if ($autonomia) : ?>
									<span>🔋 <?php echo $autonomia; ?> km</span>
								<?php endif; ?>
								<span>⚡ Elétrico</span>
							</div>
							<a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Ver Detalhes</a>
						</div>
					</article>
					<?php
				endwhile;
				wp_reset_postdata();
			else :
				?>
				<!-- Carros de exemplo quando não há posts -->
				<article class="carro-card">
					<img src="https://via.placeholder.com/400x200/6E0AD6/FFFFFF?text=Tesla+Model+3" alt="Tesla Model 3" />
					<div class="carro-card-content">
						<h2>Tesla Model 3</h2>
						<div class="carro-price">R$ 250.000,00</div>
						<div class="carro-meta">
							<span>📅 2024</span>
							<span>🔋 500 km</span>
							<span>⚡ Elétrico</span>
						</div>
						<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Ver Detalhes</a>
					</div>
				</article>
				<article class="carro-card">
					<img src="https://via.placeholder.com/400x200/FF6600/FFFFFF?text=BYD+Dolphin" alt="BYD Dolphin" />
					<div class="carro-card-content">
						<h2>BYD Dolphin</h2>
						<div class="carro-price">R$ 150.000,00</div>
						<div class="carro-meta">
							<span>📅 2024</span>
							<span>🔋 400 km</span>
							<span>⚡ Elétrico</span>
						</div>
						<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Ver Detalhes</a>
					</div>
				</article>
				<article class="carro-card">
					<img src="https://via.placeholder.com/400x200/00A335/FFFFFF?text=Nissan+Leaf" alt="Nissan Leaf" />
					<div class="carro-card-content">
						<h2>Nissan Leaf</h2>
						<div class="carro-price">R$ 180.000,00</div>
						<div class="carro-meta">
							<span>📅 2023</span>
							<span>🔋 350 km</span>
							<span>⚡ Elétrico</span>
						</div>
						<a href="#" class="btn btn-primary" style="width: 100%; margin-top: 1rem;">Ver Detalhes</a>
					</div>
				</article>
				<?php
			endif;
			?>
		</div>
	</section>

	<!-- Vantagens -->
	<section style="margin: 4rem 0; text-align: center;">
		<h2 style="font-size: 2rem; color: var(--text); margin-bottom: 2rem;">Por que escolher carros elétricos?</h2>
		<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
			<div style="padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
				<div style="font-size: 3rem; margin-bottom: 1rem;">🌱</div>
				<h3 style="color: var(--primary);">Sustentável</h3>
				<p>Zero emissões de carbono. Contribua para um planeta mais limpo.</p>
			</div>
			<div style="padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
				<div style="font-size: 3rem; margin-bottom: 1rem;">💰</div>
				<h3 style="color: var(--secondary);">Econômico</h3>
				<p>Menor custo de manutenção e economia na recarga.</p>
			</div>
			<div style="padding: 2rem; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
				<div style="font-size: 3rem; margin-bottom: 1rem;">🚀</div>
				<h3 style="color: var(--success);">Tecnologia</h3>
				<p>Recursos modernos e performance superior.</p>
			</div>
		</div>
	</section>
</div>

<?php get_footer(); ?>
