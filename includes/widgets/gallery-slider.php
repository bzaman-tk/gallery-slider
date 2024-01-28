<?php
namespace Gallery_Slider_Addon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Gallery_Slider extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Gallery Slider';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Gallery Slider', 'equity-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic', 'galleryslider' ];
	}

	// Load CSS
	// public function get_style_depends() {

	// 	wp_register_style( 'guide-posts', plugins_url( '../assets/css/guide-posts.css', __FILE__ ));

	// 	return [
	// 		'guide-posts',
	// 	];

	// }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	// public function get_keywords() {
	// 	return [ 'oembed', 'url', 'link' ];
	// }

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'first_slide_section',
			[
				'label' => esc_html__( 'First Slide', 'equity-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'fs_slide_large_image',
			[
				'label' => esc_html__( 'Choose Large Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'fs_slide_thumb_image',
			[
				'label' => esc_html__( 'Choose Thumb Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);
		$this->add_control(
			'fs_slide_title',
			[
				'label' => esc_html__( 'First Slide Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
				'default' => 'Standard Colour',
				'label_block' => true,
			]
		);
		$this->add_control(
			'fs_slide_sub_title',
			[
				'label' => esc_html__( 'First Slide Sub Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
				'default' => 'Camira Blazer Lite',
				'label_block' => true,
			]
		);
		$this->add_control(
			'fs_slide_small_title',
			[
				'label' => esc_html__( 'First Slide Small Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter your title', 'textdomain' ),
				'default' => 'Retreat',
				'label_block' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Slides', 'equity-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);


		$this->add_control(
			'slide_list',
			[
				'label' => esc_html__( 'Repeater List', 'nickbeljajev-addon' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
					[
						'name' => 'slide_caption',
						'label' => esc_html__( 'Slide Caption', 'nickbeljajev-addon' ),
						'type' => \Elementor\Controls_Manager::TEXT,
						'label_block' => true,
					],
					[
						'name' => 'slide_large_image',
						'label' => esc_html__( 'Slide Large Image', 'nickbeljajev-addon' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'name' => 'slide_thumb_image',
						'label' => esc_html__( 'Slide Thumbnail Image', 'nickbeljajev-addon' ),
						'type' => \Elementor\Controls_Manager::MEDIA,
						'default' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
					
					
				],
				'default' => [
					[
						'slide_caption' => esc_html__( 'Title #1', 'nickbeljajev-addon' ),
						// 'team_designation' => esc_html__( 'Item content. Click the edit button to change this text.', 'nickbeljajev-addon' ),
					],
					[
						'slide_caption' => esc_html__( 'Title #2', 'nickbeljajev-addon' ),
						// 'team_designation' => esc_html__( 'Item content. Click the edit button to change this text.', 'nickbeljajev-addon' ),
					],
				],
				'title_field' => '{{{ slide_caption }}}',
			]
		);

		$this->end_controls_section();


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();

	?>


	<div class="bz-main-wrap">
		<div class="swiper-containerbz gallery-top">
			<div class="swiper-wrapperbz bz-main"> 
				<img class="active-img" src="" alt="">
			</div>
		</div>
		<div class="swiper-containerbz gallery-thumbs">
			<h2>Camira</h2>
			<p>Blazer Lite</p>
			<div class="bz-nav first-thumb">
				<div id='first-thumb' class="swiper-slidebz" main='<?php echo esc_url( $settings['fs_slide_large_image']['url'] )  ?>' >
					<img src="<?php echo esc_url( $settings['fs_slide_thumb_image']['url'] )  ?>"> 
					<div>
						<h3><?php echo esc_html( $settings['fs_slide_title'] ); ?></h3>
						<span><?php echo esc_html( $settings['fs_slide_sub_title'] ); ?></span>
						<b><?php echo esc_html( $settings['fs_slide_small_title'] ); ?></b>
					</div>
				</div>
			</div>

			<h3>Bespoke Colours</h3>
			<div class="swiper-wrapperbz bz-nav">
				<?php foreach( $settings['slide_list'] as $slide_item ) { ?>
				<div class="swiper-slidebz" main='<?php echo esc_url($slide_item['slide_large_image']['url']); ?>'>
					<img src="<?php echo esc_url($slide_item['slide_thumb_image']['url']); ?>">
					<span><?php echo esc_html( $slide_item['slide_caption'] ); ?></span>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>

   
	

	<?php

	}

}