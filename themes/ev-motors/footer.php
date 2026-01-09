	</main>
	<footer class="site-footer">
		<div class="container">
			<div class="footer-content">
				<div class="footer-section">
					<h3>⚡ <?php bloginfo( 'name' ); ?></h3>
					<p>A melhor plataforma para compra e venda de carros elétricos. Sustentabilidade e tecnologia em primeiro lugar.</p>
				</div>
				<div class="footer-section">
					<h3>Links Rápidos</h3>
					<ul>
						<li><a href="<?php echo home_url('/carros'); ?>">Carros Disponíveis</a></li>
						<li><a href="<?php echo home_url('/sobre'); ?>">Sobre Nós</a></li>
						<li><a href="<?php echo home_url('/contato'); ?>">Contato</a></li>
						<li><a href="<?php echo home_url('/faq'); ?>">FAQ</a></li>
					</ul>
				</div>
				<div class="footer-section">
					<h3>Contato</h3>
					<ul>
						<li>📧 contato@veiculoseletricos.com</li>
						<li>📱 (11) 99999-9999</li>
						<li>📍 São Paulo, SP</li>
					</ul>
				</div>
				<div class="footer-section">
					<h3>Horário de Atendimento</h3>
					<ul>
						<li>Segunda a Sexta: 9h às 18h</li>
						<li>Sábado: 9h às 14h</li>
						<li>Domingo: Fechado</li>
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<p>&copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. Todos os direitos reservados.</p>
			</div>
		</div>
	</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
