<?php
/**
 * Customizer Control: Responsive.
 *
 * @package     Responsive WordPress theme
 * @subpackage  Controls
 * @since       4.9.6
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'Responsive_Customizer_Imageradio_Button_Control' ) ) :
	/**
	 * Alignment control
	 */
	class Responsive_Customizer_Imageradio_Button_Control extends WP_Customize_Control {

		/**
		 * The control type.
		 *
		 * @access public
		 * @var string
		 */
		public $type = 'responsive-imageradiobtn';

		public $image_ext;

		public function __construct($manager, $id, $args = array()) {
			parent::__construct($manager, $id, $args);
			$this->image_ext = isset($args['image_ext']) ? $args['image_ext'] : 'png';
		}

		/**
		 * Enqueue control related scripts/styles.
		 *
		 * @access public
		 */
		public function enqueue() {
			wp_enqueue_style( 'responsive-imageradiobtn', RESPONSIVE_THEME_URI . 'core/includes/customizer/assets/min/css/imageradiobtn.min.css', null );
		}


		/**
		 * Refresh the parameters passed to JavaScript via JSON.
		 *
		 * @see WP_Customize_Control::to_json()
		 */
		public function to_json() {
			parent::to_json();
			$this->json['value']       = $this->value();
			$this->json['choices']     = $this->choices;
			$this->json['link']        = $this->get_link();
			$this->json['id']          = $this->id;
			$this->json['type']        = $this->type;
			$this->json['description'] = $this->description;
			$this->json['image_ext']   = $this->image_ext;
		}

		/**
		 * Content template.
		 *
		 * @see WP_Customize_Control::print_template()
		 *
		 * @access protected
		 */
		protected function render_content() {}
	}
endif;
