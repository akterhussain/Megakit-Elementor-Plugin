<?php
namespace MegakitElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Hello World
 *
 * Elementor widget for hello world.
 *
 * @since 1.0.0
 */
class Megakit_Banner extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'mg-banner';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Mg:Bannner', 'megakit-core' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'megakit' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'megakit-core' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Sub Title', 'megakit-core' ),
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Sub Title Text', 'megakit-core' ),
				'type' => Controls_Manager::TEXT,
				'default' => 'Prepare for new future.'
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[	
				'name' => 'content_typography',
				'selector' => '{{WRAPPER}} .sub-title',
			]
		);


		// $this->add_control(
		// 	'title',
		// 	[
		// 		'label' => __( 'Title', 'megakit-core' ),
		// 		'type' => Controls_Manager::TEXT,
		// 		'default' => 'Our work is presentation of our capabilities.',
		// 		'label_block' => true,
		// 	]
		// );

		// $this->add_control(
		// 	'btn_label',
		// 	[
		// 		'label' => __( 'Button Text', 'megakit-core' ),
		// 		'type' => Controls_Manager::TEXT,
		// 		'default' => 'Get Started',
		// 	]
		// );

		// $this->add_control(
		// 	'btn_link',
		// 	[
		// 		'label' => esc_html__( 'Button Link', 'plugin-name' ),
		// 		'type' => \Elementor\Controls_Manager::URL,
		// 		'placeholder' => esc_html__( 'https://your-link.com', 'plugin-name' ),
		// 		'default' => [
		// 			'url' => '#',
		// 			'is_external' => true,
		// 			'nofollow' => true,
		// 			'custom_attributes' => '',
		// 		],
		// 	]
		// );

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Sub Title', 'megakit-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .sub-title' => 'color: {{VALUE}}',
				],
			]
		);

		// $this->add_control(
		// 	'title_color',
		// 	[
		// 		'label' => esc_html__( 'Title Color', 'plugin-name' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'selectors' => [
		// 			'{{WRAPPER}} .title' => 'color: {{VALUE}}',
		// 		],
		// 	]
		// );
		

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'megakit-core' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					'' => __( 'None', 'megakit-core' ),
					'uppercase' => __( 'UPPERCASE', 'megakit-core' ),
					'lowercase' => __( 'lowercase', 'megakit-core' ),
					'capitalize' => __( 'Capitalize', 'megakit-core' ),
				],
				'selectors' => [
					'{{WRAPPER}} .sub-title' => 'text-transform: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		
		$subtitle = $settings['subtitle'];
		// $title = $settings['title'];
		// $btn_label = $settings['btn_label'];
		// $target = $settings['btn_link']['is_external'] ? 'target="_blank':'';
		// $btn_link = $settings['btn_link']['url'];


		?>
	<section class="slider" id="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-10">
					<div class="block">
						<span class="d-block mb-3 text-white text-capitalize sub-title"><?php echo esc_html($subtitle, 'megakit-core'); ?></span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php	
	}


}

/*

<h1 class="animated fadeInUp mb-5 title"><?php echo wp_kses_post($title); ?></h1>
<a href="<?php echo esc_url($btn_link,'megakit-core'); ?>" target="_blank" class="btn btn-main animated fadeInUp btn-round-full" ><?php echo esc_html($btn_label, 'megakit-core'); ?><i class="btn-icon fa fa-angle-right ms-2"></i></a>
*/
