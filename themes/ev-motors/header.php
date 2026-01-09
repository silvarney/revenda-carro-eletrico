<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page">
	<!-- Topbar estilo classificados -->
	<div class="topbar">
		<div class="container topbar-inner">
			<div class="topbar-left">
				<span class="topbar-badge">Compra e venda</span>
				<span class="topbar-location">Ananindeua, PA</span>
			</div>
			<div class="topbar-right">
				<a href="<?php echo esc_url( home_url( '/contato' ) ); ?>" class="topbar-link">Atendimento</a>
				<a href="https://wa.me/5511999999999" target="_blank" rel="noopener" class="topbar-link">WhatsApp</a>
			</div>
		</div>
	</div>

	<header class="site-header">
		<div class="container">
			<div class="brand-search">
				<h1 class="site-brand">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
						⚡ <?php bloginfo( 'name' ); ?>
					</a>
				</h1>
				<form class="header-search" method="get" action="<?php echo esc_url( home_url('/carros') ); ?>">
					<input type="text" name="s" placeholder="Busque por marca, modelo ou palavra-chave">
					<button type="submit" class="btn btn-primary">Buscar</button>
				</form>
			</div>
			<nav class="primary-nav">
				<?php 
				wp_nav_menu( array( 
					'theme_location' => 'primary',
					'fallback_cb' => function() {
						echo '<ul>';
						echo '<li><a href="' . home_url('/') . '">Início</a></li>';
						echo '<li><a href="' . home_url('/estoque') . '" style="font-weight:700; color:var(--secondary);">🚗 Estoque</a></li>';
						echo '<li><a href="' . home_url('/carros') . '">Carros</a></li>';
						echo '<li><a href="' . home_url('/sobre') . '">Sobre</a></li>';
						echo '<li><a href="' . home_url('/contato') . '">Contato</a></li>';
						echo '</ul>';
					}
				) ); 
				?>
			</nav>
		</div>
	</header>
	<main id="content">
