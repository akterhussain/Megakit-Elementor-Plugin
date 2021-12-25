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
class Flip_Box extends Widget_Base {

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
		return 'flip_box';
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
		return __( 'Flip Box', 'megakit-core' );
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
		return [ 'flip-box-script' ];
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
				'label' => __( 'Flip Box Text', 'megakit-core' ),
			]
		);

		$this->add_control(
			'front_side_text',
			[
				'label' => __( 'Front Text', 'megakit-core' ),
				'type' => Controls_Manager::TEXT,
                'default' => 'Front Side'
			]
		);
        $this->add_control(
			'back_side_text',
			[
				'label' => __( 'Back Text', 'megakit-core' ),
				'type' => Controls_Manager::TEXT,
                'default' => 'Back Side'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Fornt Text Style', 'megakit-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'front_typography',
                'label' => __( 'Typography', 'megakit-core' ),
				'selector' => '{{WRAPPER}} .text-style-one',
			]
		);

        $this->add_control(
			'front_text_color',
			[
				'label' => esc_html__( 'Text Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-style-one' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'front_text_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box1' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

        $this->start_controls_section(
			'section_style_back',
			[
				'label' => __( 'Back Text Style', 'megakit-core' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

        $this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'back_typography',
                'label' => __( 'Typography', 'megakit-core' ),
				'selector' => '{{WRAPPER}} .text-style-two',
			]
		);

        $this->add_control(
			'back_text_color',
			[
				'label' => esc_html__( 'Text Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .text-style-two' => 'color: {{VALUE}}',
				],
			]
		);

        $this->add_control(
			'back_text_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'plugin-name' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .box2' => 'background-color: {{VALUE}}',
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
        $front_text = $settings['front_side_text'];
        $back_text = $settings['back_side_text'];

        ?>
        <div class="col_third">
            <div class="hover panel">
            <div class="front">
                <div class="box1">
                <p class="text-style-one"><?php echo esc_html($front_text); ?></p>
                </div>
            </div>
            <div class="back">
                <div class="box2">
                <p class="text-style-two"><?php echo esc_html($back_text); ?></p>
                </div>
            </div>
            </div>
		</div>
        <?php
	}
}
