<?php
/**
 * Template Name: Página de Contato
 * Description: Template para página de contato com formulário e informações
 */

get_header(); 
?>

<div class="container" style="margin-top: 1rem;">
	<nav class="breadcrumb">
		<a href="<?php echo esc_url( home_url('/') ); ?>">Início</a> <span>/</span> <?php the_title(); ?>
	</nav>

	<!-- Hero da página de contato -->
	<section style="background: linear-gradient(135deg, var(--primary) 0%, #5009b0 100%); border-radius: 12px; padding: 3rem; text-align: center; color: white; margin-bottom: 2rem;">
		<h1 style="margin: 0 0 1rem; font-size: 2.5rem;">📞 Entre em Contato</h1>
		<p style="font-size: 1.2rem; opacity: 0.95; margin: 0;">
			Estamos prontos para ajudar você a encontrar o carro elétrico perfeito!
		</p>
	</section>

	<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem; margin-bottom: 3rem;">
		<!-- Formulário de Contato -->
		<div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1);">
			<h2 style="margin-top: 0; color: var(--text);">✉️ Envie sua Mensagem</h2>
			<form method="post" action="#" style="display: grid; gap: 1.5rem;">
				<div>
					<label for="nome" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);">Nome completo *</label>
					<input type="text" id="nome" name="nome" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-light); border-radius: 6px; font-size: 1rem;">
				</div>
				
				<div>
					<label for="email" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);">E-mail *</label>
					<input type="email" id="email" name="email" required style="width: 100%; padding: 12px; border: 1px solid var(--gray-light); border-radius: 6px; font-size: 1rem;">
				</div>
				
				<div>
					<label for="telefone" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);">Telefone *</label>
					<input type="tel" id="telefone" name="telefone" required placeholder="(00) 00000-0000" style="width: 100%; padding: 12px; border: 1px solid var(--gray-light); border-radius: 6px; font-size: 1rem;">
				</div>
				
				<div>
					<label for="interesse" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);">Interesse em</label>
					<select id="interesse" name="interesse" style="width: 100%; padding: 12px; border: 1px solid var(--gray-light); border-radius: 6px; font-size: 1rem;">
						<option value="">Selecione...</option>
						<option value="compra">Comprar um carro</option>
						<option value="venda">Vender meu carro</option>
						<option value="financiamento">Informações sobre financiamento</option>
						<option value="test-drive">Agendar test-drive</option>
						<option value="outros">Outros assuntos</option>
					</select>
				</div>
				
				<div>
					<label for="mensagem" style="display: block; font-weight: 600; margin-bottom: 0.5rem; color: var(--text);">Mensagem *</label>
					<textarea id="mensagem" name="mensagem" required rows="5" style="width: 100%; padding: 12px; border: 1px solid var(--gray-light); border-radius: 6px; font-size: 1rem; resize: vertical;"></textarea>
				</div>
				
				<button type="submit" class="btn btn-primary" style="width: 100%; padding: 15px; font-size: 1.1rem;">
					📨 Enviar Mensagem
				</button>
			</form>
		</div>

		<!-- Informações de Contato -->
		<div>
			<div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1); margin-bottom: 1.5rem;">
				<h2 style="margin-top: 0; color: var(--text);">📍 Nossas Informações</h2>
				
				<div style="display: grid; gap: 1.5rem;">
					<div style="display: flex; gap: 1rem; align-items: start;">
						<div style="font-size: 2rem;">📍</div>
						<div>
							<h3 style="margin: 0 0 0.5rem; font-size: 1.1rem; color: var(--text);">Endereço</h3>
							<p style="margin: 0; color: var(--gray); line-height: 1.6;">
								Avenida Principal, 1234<br>
								Centro - Ananindeua, PA<br>
								CEP: 67000-000
							</p>
						</div>
					</div>
					
					<div style="display: flex; gap: 1rem; align-items: start;">
						<div style="font-size: 2rem;">📞</div>
						<div>
							<h3 style="margin: 0 0 0.5rem; font-size: 1.1rem; color: var(--text);">Telefone</h3>
							<p style="margin: 0; color: var(--gray);">
								<a href="tel:+5511999999999" style="color: var(--primary); text-decoration: none; font-weight: 600;">
									(11) 99999-9999
								</a>
							</p>
						</div>
					</div>
					
					<div style="display: flex; gap: 1rem; align-items: start;">
						<div style="font-size: 2rem;">📧</div>
						<div>
							<h3 style="margin: 0 0 0.5rem; font-size: 1.1rem; color: var(--text);">E-mail</h3>
							<p style="margin: 0; color: var(--gray);">
								<a href="mailto:contato@veiculoseletricos.com.br" style="color: var(--primary); text-decoration: none; font-weight: 600;">
									contato@veiculoseletricos.com.br
								</a>
							</p>
						</div>
					</div>
					
					<div style="display: flex; gap: 1rem; align-items: start;">
						<div style="font-size: 2rem;">⏰</div>
						<div>
							<h3 style="margin: 0 0 0.5rem; font-size: 1.1rem; color: var(--text);">Horário de Atendimento</h3>
							<p style="margin: 0; color: var(--gray); line-height: 1.6;">
								Segunda a Sexta: 8h às 18h<br>
								Sábado: 9h às 13h<br>
								Domingo: Fechado
							</p>
						</div>
					</div>
				</div>
			</div>

			<!-- WhatsApp -->
			<a href="https://wa.me/5511999999999?text=Olá! Gostaria de mais informações sobre carros elétricos." 
			   target="_blank" 
			   rel="noopener noreferrer"
			   style="display: block; background: #25D366; color: white; padding: 1.5rem; border-radius: 12px; text-align: center; text-decoration: none; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.3); transition: all 0.3s ease;">
				<div style="font-size: 3rem; margin-bottom: 0.5rem;">💬</div>
				<h3 style="margin: 0 0 0.5rem; font-size: 1.3rem;">Fale pelo WhatsApp</h3>
				<p style="margin: 0; opacity: 0.9;">Atendimento rápido e direto!</p>
			</a>
		</div>
	</div>

	<!-- Mapa (opcional) -->
	<section style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1); margin-bottom: 3rem;">
		<h2 style="margin-top: 0; color: var(--text);">🗺️ Como Chegar</h2>
		<div style="width: 100%; height: 400px; background: var(--bg); border-radius: 8px; display: flex; align-items: center; justify-content: center; color: var(--gray);">
			<div style="text-align: center;">
				<div style="font-size: 4rem; margin-bottom: 1rem;">📍</div>
				<p>Mapa será carregado aqui</p>
				<p style="font-size: 0.9rem; margin-top: 0.5rem;">
					<a href="https://maps.google.com/?q=Ananindeua,PA" target="_blank" style="color: var(--primary); text-decoration: none; font-weight: 600;">
						Abrir no Google Maps →
					</a>
				</p>
			</div>
		</div>
	</section>

	<!-- FAQs -->
	<section style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,.1); margin-bottom: 3rem;">
		<h2 style="margin-top: 0; color: var(--text);">❓ Perguntas Frequentes</h2>
		<div style="display: grid; gap: 1.5rem;">
			<details style="border: 1px solid var(--gray-light); padding: 1.5rem; border-radius: 8px;">
				<summary style="font-weight: 600; cursor: pointer; color: var(--text);">Vocês aceitam carro usado na troca?</summary>
				<p style="margin: 1rem 0 0; color: var(--gray); line-height: 1.6;">
					Sim! Aceitamos seu carro usado como parte do pagamento. Nossa equipe faz uma avaliação justa e transparente do seu veículo.
				</p>
			</details>
			
			<details style="border: 1px solid var(--gray-light); padding: 1.5rem; border-radius: 8px;">
				<summary style="font-weight: 600; cursor: pointer; color: var(--text);">Oferecem financiamento?</summary>
				<p style="margin: 1rem 0 0; color: var(--gray); line-height: 1.6;">
					Sim! Trabalhamos com as melhores instituições financeiras para oferecer condições especiais de financiamento com taxas competitivas.
				</p>
			</details>
			
			<details style="border: 1px solid var(--gray-light); padding: 1.5rem; border-radius: 8px;">
				<summary style="font-weight: 600; cursor: pointer; color: var(--text);">Posso agendar um test-drive?</summary>
				<p style="margin: 1rem 0 0; color: var(--gray); line-height: 1.6;">
					Claro! Entre em contato conosco pelo WhatsApp ou telefone para agendar seu test-drive. É totalmente gratuito e sem compromisso.
				</p>
			</details>
			
			<details style="border: 1px solid var(--gray-light); padding: 1.5rem; border-radius: 8px;">
				<summary style="font-weight: 600; cursor: pointer; color: var(--text);">Qual a garantia dos veículos?</summary>
				<p style="margin: 1rem 0 0; color: var(--gray); line-height: 1.6;">
					Todos os nossos veículos passam por rigorosa inspeção e vêm com garantia. A garantia varia conforme o modelo e ano do veículo.
				</p>
			</details>
		</div>
	</section>
</div>

<?php get_footer(); ?>
