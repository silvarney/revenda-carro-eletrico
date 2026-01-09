<?php
/**
 * Meta Boxes
 *
 * @package RevendaCarrosEletricos
 */

class RCE_Meta_Boxes {
	
	public function __construct() {
		add_action('add_meta_boxes', array($this, 'add_car_meta_boxes'));
		add_action('save_post_carros', array($this, 'save_car_meta'), 10, 2);
	}
	
	public function add_car_meta_boxes() {
		add_meta_box(
			'rce_car_details',
			'Informações do Veículo',
			array($this, 'render_car_details_box'),
			'carros',
			'normal',
			'high'
		);
		
		add_meta_box(
			'rce_car_specs',
			'Especificações Técnicas',
			array($this, 'render_car_specs_box'),
			'carros',
			'normal',
			'high'
		);
		
		add_meta_box(
			'rce_car_features',
			'Características e Opcionais',
			array($this, 'render_car_features_box'),
			'carros',
			'normal',
			'default'
		);
	}
	
	public function render_car_details_box($post) {
		wp_nonce_field('rce_save_car_meta', 'rce_car_meta_nonce');
		
		$preco = get_post_meta($post->ID, '_rce_preco', true);
		$ano = get_post_meta($post->ID, '_rce_ano', true);
		$km = get_post_meta($post->ID, '_rce_km', true);
		$cor = get_post_meta($post->ID, '_rce_cor', true);
		$placa = get_post_meta($post->ID, '_rce_placa', true);
		$cidade = get_post_meta($post->ID, '_rce_cidade', true);
		$estado = get_post_meta($post->ID, '_rce_estado', true);
		?>
		<style>
			.rce-meta-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 15px; }
			.rce-meta-field { display: flex; flex-direction: column; }
			.rce-meta-field label { font-weight: 600; margin-bottom: 5px; }
			.rce-meta-field input, .rce-meta-field select { padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
		</style>
		<div class="rce-meta-grid">
			<div class="rce-meta-field">
				<label for="rce_preco">Preço (R$)</label>
				<input type="number" id="rce_preco" name="rce_preco" value="<?php echo esc_attr($preco); ?>" step="0.01">
			</div>
			<div class="rce-meta-field">
				<label for="rce_ano">Ano</label>
				<input type="number" id="rce_ano" name="rce_ano" value="<?php echo esc_attr($ano); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_km">Quilometragem (km)</label>
				<input type="number" id="rce_km" name="rce_km" value="<?php echo esc_attr($km); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_cor">Cor</label>
				<input type="text" id="rce_cor" name="rce_cor" value="<?php echo esc_attr($cor); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_placa">Placa</label>
				<input type="text" id="rce_placa" name="rce_placa" value="<?php echo esc_attr($placa); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_cidade">Cidade</label>
				<input type="text" id="rce_cidade" name="rce_cidade" value="<?php echo esc_attr($cidade); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_estado">Estado</label>
				<select id="rce_estado" name="rce_estado">
					<option value="">Selecione...</option>
					<?php 
					$estados = array('AC','AL','AP','AM','BA','CE','DF','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SC','SP','SE','TO');
					foreach($estados as $uf) {
						echo '<option value="'.$uf.'"'.selected($estado, $uf, false).'>'.$uf.'</option>';
					}
					?>
				</select>
			</div>
		</div>
		<?php
	}
	
	public function render_car_specs_box($post) {
		$motor = get_post_meta($post->ID, '_rce_motor', true);
		$potencia = get_post_meta($post->ID, '_rce_potencia', true);
		$torque = get_post_meta($post->ID, '_rce_torque', true);
		$bateria = get_post_meta($post->ID, '_rce_bateria', true);
		$autonomia = get_post_meta($post->ID, '_rce_autonomia', true);
		$tempo_carga = get_post_meta($post->ID, '_rce_tempo_carga', true);
		$aceleracao = get_post_meta($post->ID, '_rce_aceleracao', true);
		$velocidade_max = get_post_meta($post->ID, '_rce_velocidade_max', true);
		$portas = get_post_meta($post->ID, '_rce_portas', true);
		$lugares = get_post_meta($post->ID, '_rce_lugares', true);
		$cambio = get_post_meta($post->ID, '_rce_cambio', true);
		$tracao = get_post_meta($post->ID, '_rce_tracao', true);
		?>
		<div class="rce-meta-grid">
			<div class="rce-meta-field">
				<label for="rce_motor">Motor</label>
				<input type="text" id="rce_motor" name="rce_motor" value="<?php echo esc_attr($motor); ?>" placeholder="Ex: Elétrico 150kW">
			</div>
			<div class="rce-meta-field">
				<label for="rce_potencia">Potência (cv)</label>
				<input type="text" id="rce_potencia" name="rce_potencia" value="<?php echo esc_attr($potencia); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_torque">Torque (Nm)</label>
				<input type="text" id="rce_torque" name="rce_torque" value="<?php echo esc_attr($torque); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_bateria">Bateria (kWh)</label>
				<input type="text" id="rce_bateria" name="rce_bateria" value="<?php echo esc_attr($bateria); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_autonomia">Autonomia (km)</label>
				<input type="number" id="rce_autonomia" name="rce_autonomia" value="<?php echo esc_attr($autonomia); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_tempo_carga">Tempo de Carga</label>
				<input type="text" id="rce_tempo_carga" name="rce_tempo_carga" value="<?php echo esc_attr($tempo_carga); ?>" placeholder="Ex: 8h (AC) / 40min (DC)">
			</div>
			<div class="rce-meta-field">
				<label for="rce_aceleracao">0-100 km/h (s)</label>
				<input type="text" id="rce_aceleracao" name="rce_aceleracao" value="<?php echo esc_attr($aceleracao); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_velocidade_max">Velocidade Máxima (km/h)</label>
				<input type="text" id="rce_velocidade_max" name="rce_velocidade_max" value="<?php echo esc_attr($velocidade_max); ?>">
			</div>
			<div class="rce-meta-field">
				<label for="rce_portas">Portas</label>
				<select id="rce_portas" name="rce_portas">
					<option value="">Selecione...</option>
					<option value="2" <?php selected($portas, '2'); ?>>2 portas</option>
					<option value="4" <?php selected($portas, '4'); ?>>4 portas</option>
					<option value="5" <?php selected($portas, '5'); ?>>5 portas</option>
				</select>
			</div>
			<div class="rce-meta-field">
				<label for="rce_lugares">Lugares</label>
				<input type="number" id="rce_lugares" name="rce_lugares" value="<?php echo esc_attr($lugares); ?>" min="2" max="7">
			</div>
			<div class="rce-meta-field">
				<label for="rce_cambio">Câmbio</label>
				<select id="rce_cambio" name="rce_cambio">
					<option value="">Selecione...</option>
					<option value="Automático" <?php selected($cambio, 'Automático'); ?>>Automático</option>
					<option value="CVT" <?php selected($cambio, 'CVT'); ?>>CVT</option>
					<option value="Redução Fixa" <?php selected($cambio, 'Redução Fixa'); ?>>Redução Fixa</option>
				</select>
			</div>
			<div class="rce-meta-field">
				<label for="rce_tracao">Tração</label>
				<select id="rce_tracao" name="rce_tracao">
					<option value="">Selecione...</option>
					<option value="Dianteira" <?php selected($tracao, 'Dianteira'); ?>>Dianteira</option>
					<option value="Traseira" <?php selected($tracao, 'Traseira'); ?>>Traseira</option>
					<option value="4x4" <?php selected($tracao, '4x4'); ?>>4x4 / AWD</option>
				</select>
			</div>
		</div>
		<?php
	}
	
	public function render_car_features_box($post) {
		$opcionais = get_post_meta($post->ID, '_rce_opcionais', true);
		if (!is_array($opcionais)) $opcionais = array();
		
		$all_features = array(
			'Ar Condicionado',
			'Ar Condicionado Digital',
			'Vidros Elétricos',
			'Travas Elétricas',
			'Direção Elétrica',
			'Piloto Automático',
			'Controle de Cruzeiro Adaptativo',
			'Sistema de Frenagem Automática',
			'Alerta de Colisão',
			'Assistente de Permanência em Faixa',
			'Sensor de Estacionamento',
			'Câmera de Ré',
			'Câmera 360°',
			'Teto Solar Panorâmico',
			'Bancos em Couro',
			'Bancos Aquecidos',
			'Bancos Ventilados',
			'Volante Aquecido',
			'Sistema de Som Premium',
			'Central Multimídia',
			'Apple CarPlay',
			'Android Auto',
			'Carregamento Sem Fio',
			'Painel Digital',
			'Head-Up Display',
			'Keyless Entry',
			'Start-Stop',
			'Rodas de Liga Leve',
			'Faróis de LED',
			'Faróis Automáticos',
			'Sensor de Chuva',
			'Retrovisores Elétricos',
			'Airbags',
			'ABS',
			'Controle de Tração',
			'Controle de Estabilidade',
		);
		?>
		<div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 10px;">
			<?php foreach($all_features as $feature): ?>
				<label style="display: flex; align-items: center; gap: 8px;">
					<input type="checkbox" name="rce_opcionais[]" value="<?php echo esc_attr($feature); ?>" 
						<?php checked(in_array($feature, $opcionais)); ?>>
					<span><?php echo esc_html($feature); ?></span>
				</label>
			<?php endforeach; ?>
		</div>
		<?php
	}
	
	public function save_car_meta($post_id, $post) {
		if (!isset($_POST['rce_car_meta_nonce']) || !wp_verify_nonce($_POST['rce_car_meta_nonce'], 'rce_save_car_meta')) {
			return;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return;
		}
		
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
		
		$fields = array(
			'preco', 'ano', 'km', 'cor', 'placa', 'cidade', 'estado',
			'motor', 'potencia', 'torque', 'bateria', 'autonomia', 'tempo_carga',
			'aceleracao', 'velocidade_max', 'portas', 'lugares', 'cambio', 'tracao'
		);
		
		foreach($fields as $field) {
			if (isset($_POST['rce_' . $field])) {
				update_post_meta($post_id, '_rce_' . $field, sanitize_text_field($_POST['rce_' . $field]));
			}
		}
		
		if (isset($_POST['rce_opcionais'])) {
			update_post_meta($post_id, '_rce_opcionais', array_map('sanitize_text_field', $_POST['rce_opcionais']));
		} else {
			delete_post_meta($post_id, '_rce_opcionais');
		}
	}
}
