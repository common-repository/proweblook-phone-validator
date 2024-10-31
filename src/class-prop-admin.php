<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**x
 * Registers and handles the admin area.
 *
 * @package prop
 */

/**
 * Class PROP_Admin
 */
class PROP_Admin
{

	/**
	 * Plugin instance.
	 *
	 * @see   get_instance()
	 * @var  object
	 */
	protected static $instance = NULL;

	/**
	 * Load the admin interface
	 *
	 * @return void
	 */
	public function load()
	{

		// Check, if the admin notice should be hidden.
		if (
			current_user_can('manage_options') &&
			!empty($_GET['prop-api-key-notice']) && // Input var okay.
			wp_verify_nonce(sanitize_key(wp_unslash($_GET['prop-api-key-notice'])), 'remove-api-key-notice') // Input var okay.
		) {
			update_option('prop-api-key-invalid', 0);
		}

		// Check, if the admin notice should be displayed.
		if (1 === (int) get_option('prop-api-key-invalid')) {
			add_action('admin_notices', array($this, 'show_notice'));
		}

		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		add_action('admin_menu', array($this, 'admin_menu'));
		add_action('admin_init', array($this, 'register_settings'));
	}

	/**
	 * Shows the admin notice.
	 *
	 * @return void
	 */
	public function show_notice()
	{
		$url = admin_url('options-general.php');
		$url = add_query_arg(
			array(
				'page'                => 'Proweblook_phone_validator',
				'prop-api-key-notice' => wp_create_nonce('remove-api-key-notice'),
			),
			$url
		);
?>
		<div class="notice notice-error">
			<p>
				<?php esc_html_e('The API Key is invalid.', 'Proweblook-phone-validator'); ?>
				<a href="<?php echo esc_url($url); ?>"><?php esc_html_e('Go to settings and hide message', 'Proweblook-phone-validator'); ?></a>
			</p>

		</div>
	<?php
	}

	/**
	 * Register the admin menu.
	 *
	 * @return void
	 */
	function admin_menu()
	{

		add_options_page(__('Proweblook Phone Validator', 'Proweblook-phone-validator'), __('Proweblook Phone Validator', 'Proweblook-phone-validator'), 'manage_options', 'Proweblook_phone_validator', array($this, 'render_page'));
	}

	/**
	 * Render the page.
	 *
	 * @return void
	 */
	function render_page()
	{

	?>
		<div class="wrap">
			<h1><?php esc_html_e('Proweblook Phone Validator', 'Proweblook-phone-validator'); ?></h1>
			<form action='options.php' method='post'>
				<?php
				settings_fields('Proweblook_phone_validator');
				do_settings_sections('Proweblook_phone_validator');
				submit_button();
				?>
			</form>

			<div class="card propp-card" style="">
				<h2><?php esc_html_e('Validate Phone Number', 'Proweblook-phone-validator'); ?></h2>
				<p><?php esc_html_e('Please enter the phone number you want to validate.', 'Proweblook-phone-validator'); ?></p>
				<table class="form-table">
					<tbody>
						<tr>
							<th scope="row"><?php esc_html_e('Phone number', 'Proweblook-phone-validator'); ?></th>
							<td>
								<input id="propp-phone" value="" type="text">
							</td>
						</tr>
					</tbody>
				</table>
				<p id="propp-message"></p>
				<p class="submit">
					<input name="submit" id="propp-button-validate" class="button button-primary" value="<?php echo esc_attr(__('Validate', 'Proweblook-phone-validator')); ?>" type="submit">
				</p>
				<ul id="propp-list"></ul>
			</div>

			<div class="card propp-card" style="">
				<?php echo esc_html($this->show_balance()); ?>
			</div>

		</div>
		<?php
	}

	/**
	 * Enqueue the necessary scripts and styles
	 *
	 * @param string $hook The page hook.
	 *
	 * @return void
	 */
	function enqueue($hook)
	{

		if ('settings_page_Proweblook_phone_validator' !== $hook) {
			return;
		}

		$plugin = PROP_Plugin::get_instance();
		$plugin_url = $plugin->get_plugin_url();
		$min = (!$plugin->is_debug()) ? '.min' : '';
// Define your plugin version
$plugin_version = '1.4.1';

// Register the main stylesheet.
wp_register_style('propp_main_style', $plugin_url . 'assets/css/propp_style' . $min . '.css', array(), $plugin_version);

// Register the main script.
wp_register_script('propp_main_script', $plugin_url . 'assets/js/propp_script' . $min . '.js', array('jquery'), $plugin_version, true);

		$js_vars = $plugin->js_localization();
		$js_vars['ul_tpl'] = '<% console.log( data ); %><li><span><%- data.status %></span><%- data.phone %></li>';

		wp_localize_script('propp_main_script', 'propp', $js_vars);
		wp_enqueue_script('propp_main_script');
		wp_enqueue_style('propp_main_style');
	}

	/**
	 * Register the settings
	 *
	 * @return void
	 */
	function register_settings()
	{

		register_setting('Proweblook_phone_validator', 'propp_settings');

		add_settings_section(
			'propp_pluginPage_section',
			__('Phone Validator Options', 'Proweblook-phone-validator'),
			array($this, 'render_section'),
			'Proweblook_phone_validator'
		);

		add_settings_field(
			'propp_api_key',
			__('API Key', 'Proweblook-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'apikey',
				'type'    => 'text',
				'key'     => 'propp_api_key',
				'default' => '',
			)
		);

		add_settings_field(
			'propp_auto_check',
			__('Validate phone numbers on WooCommerce Checkout', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'woocommerce',
				'type'    => 'checkbox',
				'key'     => 'propp_auto_check',
				'default' => 0,
			)
		);

		add_settings_field(
			'propp_cf7_check',
			__('Validate phone numbers with Contact Form 7', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'cf7',
				'type'    => 'checkbox',
				'key'     => 'propp_cf7_check',
				'default' => 0,
			)
		);

		add_settings_field(
			'propp_gravity_check',
			__('Validate phone numbers with Gravity Forms', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'gf',
				'type'    => 'checkbox',
				'key'     => 'propp_gravity_check',
				'default' => 0,
			)
		);

		add_settings_field(
			'propp_wpforms_check',
			__('Validate phone numbers with WPForms', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'wpf',
				'type'    => 'checkbox',
				'key'     => 'propp_wpforms_check',
				'default' => 0,
			)
		);

		add_settings_field(
			'propp_ninja_check',
			__('Validate phone numbers with Ninja Forms', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'nf',
				'type'    => 'checkbox',
				'key'     => 'propp_ninja_check',
				'default' => 0,
			)
		);

		add_settings_field(
			'propp_country',
			__('Country (leave empty to validate international phone numbers)', 'bpmvp-phone-validator'),
			array($this, 'render_settings_field'),
			'Proweblook_phone_validator',
			'propp_pluginPage_section',
			array(
				'id'      => 'country',
				'type'    => 'select',
				'key'     => 'propp_country',
				'default' => 0,
			)
		);
	}

	/**
	 * Renders the section area.
	 *
	 * @return void
	 */
	function render_section()
	{

		$plugin = PROP_Plugin::get_instance();

		echo '<p>';
		echo wp_kses_post(__('International Phone Number Validation<br/>
The Phone-Validator real-time validation API provides detailed information for each phone number:<br/>
Status: VALID/CONFIRMED, VALID/UNCONFIRMED or INVALID<br/>
Line type: FIXED_LINE, MOBILE, VOIP etc.<br/>
Geolocation: Region and city<br/>
Timezone: Timezone of location<br/>
Phone number correction and re-formatting according to national and international standards.<br/>
During the entire process, the phone number is not contacted in any way, nor will any phones connected to a line ring.', 'Proweblook-phone-validator'));
		echo '</p>';

		echo '<br><br>';
		echo wp_kses_post(__('You can register for a <a href="https://proweblook.com/phone-number-validator" target="_blank">free API key</a> (limited to 10 phone number checks).<br>
If you want to verify more than 10 numbers, please have a look at our pay-as-you-go pricing model and the <a href="https://proweblook.com/phone-number-validator" target="_blank">subscription plans</a> we offer.', 'Proweblook-phone-validator'));
	}

	/**
	 * Render a settings field
	 *
	 * @param array $args Specify the field.
	 *
	 * @return void
	 */
	public function render_settings_field($args)
	{
		$default_args = array(
			'id'      => 'apikey',
			'type'    => 'text',
			'key'     => 'propp_api_key',
			'default' => 0,
		);
		$args = wp_parse_args($args, $default_args);

		$plugin = PROP_Plugin::get_instance();
		$option = $plugin->get_option($args['key']);
		$value = (NULL !== $option) ? $option : $args['default'];

		if ('text' === $args['type']) :
		?>
			<input id="PROP_phone_<?php echo esc_attr($key); ?>" type="text" name="propp_settings[<?php echo esc_attr($args['key']); ?>]" value="<?php echo esc_attr($value); ?>">
		<?php
		elseif ('checkbox' === $args['type']) : ?>
			<input id="PROP_phone_<?php echo esc_attr($key); ?>" type="checkbox" name="propp_settings[<?php echo esc_attr($args['key']); ?>]" value="1" <?php checked($value, 1); ?>>
		<?php
		elseif ('select' === $args['type']) : ?>
			<select id="PROP_phone_<?php echo esc_attr($key); ?>" name="propp_settings[<?php echo esc_attr($args['key']); ?>]">
				<option></option>
				<?php
				$countries = PROP_Countries::get_list();
				foreach ($countries as $code => $name) :
				?>
					<option <?php selected($value, $code); ?> value="<?php echo esc_attr($code); ?>"><?php echo esc_html($name); ?></option>
				<?php
				endforeach;
				?>
			</select>
<?php
		endif;
	}

	/**
	 * Access this plugin’s working instance
	 *
	 * @wp-hook plugins_loaded
	 * @return  object of this class
	 */
	public static function get_instance()
	{

		NULL === self::$instance and self::$instance = new self;

		return self::$instance;
	}


	/**
	 * Empty and protected constructor.
	 */
	protected function __construct()
	{
	}

	/**
	 * Empty and private clone.
	 */
	private function __clone()
	{
	}
	public function show_balance()
	{
		$plugin = PROP_Plugin::get_instance();
		$api_key = $plugin->get_option('propp_api_key');

		if (empty($api_key)) {
			echo '<p>';
			esc_html_e('API Key is not set. Please configure it in the settings.', 'Proweblook-phone-validator');
			echo '</p>';
			return;
		}

		$api_url = 'https://lookup.proweblook.com/api/v1/balance';
		$url = add_query_arg(
			array(
				'service'  => 'phonevalidation',
				'api_key'  => $api_key,
			),
			$api_url
		);

		$result = wp_remote_get($url);

		if (!is_wp_error($result)) {
			$response_data = json_decode(wp_remote_retrieve_body($result), true);
			if (isset($response_data['balance'])) {
				echo '<p>';
				// translators: %d is a placeholder for the remaining balance amount.
				printf(
					'<span>%s</span>',
					esc_html(
						sprintf(
							/* translators: %d: remaining balance amount */
							__('Remaining Balance: %d', 'Proweblook-phone-validator'),
							$response_data['balance']
						)
					)
				);
				echo '</p>';
			}
		}		
	}
}
