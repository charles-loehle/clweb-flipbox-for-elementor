<?php 

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;


class CLWeb_Elementor_Flipbox2 extends Widget_Base {
	public function get_name() {
		return 'clweb-elementor-flipbox2';
	}

	public function get_title() {
		return __( 'CLWeb Elementor Flipbox', 'clweb-elementor-flipbox2' );
	}

	public function get_icon() {
		return 'eicon-flip-box';
	}

	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	public function get_categories() {
		return [ 'general' ];
	}

	public function get_keywords() {
		return [ 'flipbox', 'flipboxes' ];
	}

	public function get_script_depends() {
		wp_register_script('clweb-elementor-flipbox2-script', plugins_url('assets/js/clweb-elementor-flipbox2.js', __FILE__));
		
		return [ 
			'clweb-elementor-flipbox2-script' 
		];
	}

	public function get_style_depends() {
		wp_register_style( 'clweb-elementor-flipbox2-style', plugins_url( 'assets/css/clweb-elementor-flipbox2.css', __FILE__ ) );

		return [
			'clweb-elementor-flipbox2-style',
		];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'section_type',
			[
				'label' => __( 'FlipBox Settings', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_style',
			[
				'label' => esc_html__('Style', 'clweb-elementor-flipbox2'),
				'type' => Controls_Manager::SELECT,
				'default' => 'flip-box-style',
				'options' => [
					'flip-box-style'      => esc_html__('Flip',  'clweb-elementor-flipbox2'),
					'rotate-box-style'    => esc_html__('Rotate',  'clweb-elementor-flipbox2'),
					'zoomin-box-style'    => esc_html__('Zoom In',  'clweb-elementor-flipbox2'),
					'zoomout-box-style'   => esc_html__('Zoom Out',  'clweb-elementor-flipbox2'),
					'side-right-style'    => esc_html__('Slide Right',  'clweb-elementor-flipbox2'),
					'side-left-style'     => esc_html__('Slide Left',  'clweb-elementor-flipbox2'),
					'to-top-style'        => esc_html__('Slide Up',  'clweb-elementor-flipbox2'),
					'to-bottom-style'     => esc_html__('Slide Down',  'clweb-elementor-flipbox2'),
				],
			]
		);


		$this->add_control(
    'clweb_flipbox_type',
			[
				'label' => __( 'Filp Box Orientation', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::CHOOSE,
				'default'   => __( 'vertical', 'clweb-elementor-flipbox2' ),
				'options' => [
						'horizontal'    => [
							'title' => __( 'Horizontal', 'clweb-elementor-flipbox2' ),
							'icon' => 'eicon-spacer',
						],
						'vertical' => [
							'title' => __( 'Vertical', 'clweb-elementor-flipbox2' ),
							'icon' => 'eicon-v-align-stretch',
						]
					],
				'condition' => [
					'clweb_flipbox_style' => 'flip-box-style',
				],
			]
		);

		$this->add_control(
			'clweb_flipbox_type-min-height',
			[
				'label' => esc_html__( 'Min Height', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
				'description' => 'Unit in px',
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__holder ' => 'height: {{VALUE}}px;',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding', 'clweb-elementor-flipbox2' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .clweb-flipbox__back' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			'box-shadow',
			[
				'name' => 'box_shadow',
				'selector' => '{{WRAPPER}} .clweb-flipbox__back, {{WRAPPER}} .clweb-flipbox__front',
			]
		);

		$this->add_control(
			'clweb_flipbox_border_color',
			[
				'label' => __( 'Color', 'clweb-elementor-flipbox2' ),
				'type' => 'color',
				'selectors' => [
					'{{WRAPPER}}  .clweb-flipbox__front' => 'border-color: {{VALUE}};',
					'{{WRAPPER}}  .clweb-flipbox__back' => 'border-color: {{VALUE}};',
				],
				'condition' => [
					'border_border!' => '',
				],
			]
		);

		$this->add_group_control(
			'border',
			[
				'name' => 'border',
				'placeholder' => '1px',
				'exclude' => [ 'color' ],
				'fields_options' => [
					'width' => [
						'label' => __( 'Border Width', 'clweb-elementor-flipbox2' ),
					],
				],
				'selector' => '{{WRAPPER}} .clweb-flipbox__back, {{WRAPPER}} .clweb-flipbox__front',
			]
		);

		$this->add_control(
			'clweb_flipbox_border_radius',
			[
				'label' => __( 'Border Radius', 'clweb-elementor-flipbox2' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', '%' ],
				'default' => [
					'unit' => 'px',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .clweb-flipbox__back' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Background & Colors', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_f_icon',
			[
				 'label' => __( 'Front Side Image Icon', 'clweb-elementor-flipbox2' ),
				 'type' => Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'clweb_flipbox_f_bg_img',
			[
				 'label' => __( 'Front Side Image background', 'clweb-elementor-flipbox2' ),
				 'type' => Controls_Manager::MEDIA,
				 'dynamic' => [
						'active' => true,
				 ],
				 'selectors' => [
 					'{{WRAPPER}} .clweb-flipbox__front' => 'background-image: url({{URL}});',
 				]
			]
		);

		$this->add_control(
			'clweb_flipbox_f_bg_color',
			[
				'label' => __( 'Front Side Background Color', 'clweb-elementor-flipbox2' ),
				'default' => '#52ffaf',
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front' => 'background-color: {{VALUE}};',
				]
			]

		);


		$this->add_control(
		  'clweb_flipbox_b_icon',
		  [
		     'label' => __( 'Back Side Image Icon', 'clweb-elementor-flipbox2' ),
		     'type' => Controls_Manager::MEDIA
		  ]
		);

		$this->add_control(
		  'clweb_flipbox_b_bg_img',
		  [
		     'label' => __( 'Back Side Image background', 'clweb-elementor-flipbox2' ),
			 'type' => Controls_Manager::MEDIA,
			 'dynamic' => [
				'active' => true,
		 		],
				 'selectors' => [
 					'{{WRAPPER}} .clweb-flipbox__back' => 'background-image:url({{URL}});',
 				]
		  ]
		);

		$this->add_control(
		  'clweb_flipbox_b_bg_color',
		  [
		    'label' => __( 'Back Side Background Color', 'clweb-elementor-flipbox2' ),
				'default' => '#ee8cff',
		    'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__back' => 'background-color: {{VALUE}};',
				]
		  ]
		);
		$this->end_controls_section();


		/*
		Title & Contents
		----------------------------------------------------------------------------
		*/
		$this->start_controls_section(
			'section_texts',
			[
				'label' => __( 'Title & Contents', 'clweb-elementor-flipbox2' ),
			]
		);


		$this->add_control(
			'title_tag',
			[
				'label' => __( 'Title HTML Tag', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'h1'   => __( 'H1',   'clweb-elementor-flipbox2' ),
					'h2'   => __( 'H2',   'clweb-elementor-flipbox2' ),
					'h3'   => __( 'H3',   'clweb-elementor-flipbox2' ),
					'h4'   => __( 'H4',   'clweb-elementor-flipbox2' ),
					'h5'   => __( 'H5',   'clweb-elementor-flipbox2' ),
					'h6'   => __( 'H6',   'clweb-elementor-flipbox2' ),
					'div'  => __( 'div',  'clweb-elementor-flipbox2' ),
					'span' => __( 'Span', 'clweb-elementor-flipbox2' ),
				],
				'default' => 'div',
			]
		);

		$this->add_control(
			'content_tag',
			[
				'label' => __( 'Description HTML Tag', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'div'  => __( 'div',  'clweb-elementor-flipbox2' ),
					'span' => __( 'Span', 'clweb-elementor-flipbox2' ),
					'p'    => __( 'P',    'clweb-elementor-flipbox2' ),
				],
				'default' => 'div',
			]
		);


		$this->add_control(
			'clweb_flipbox_f_title',
			[
				'label' => esc_html__( 'Front Title', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::TEXT,
				'dynamic' => [
					'active' => true,
				],
				'default'     => esc_html__( 'This is The Front Title', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_f_desc',
			[
				'label' => __( 'Front Description', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::TEXTAREA,
				'default'     => __( 'Hover here', 'clweb-elementor-flipbox2' ),
				'dynamic' => [
					'active' => true,
				],
				'default'     => esc_html__( 'This is The Front Description', 'clweb-elementor-flipbox2' ),
				'placeholder' => __( 'Please', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_b_title',
			[
				'label' => __( 'Back Title', 'clweb-elementor-flipbox2' ),
			'type' => Controls_Manager::TEXT,
			'dynamic' => [
				'active' => true,
				],
				'default'     => __( 'Back Title', 'clweb-elementor-flipbox2' ),
			'placeholder' => __( 'Please enter the flipbox back title', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_b_desc',
			[
				'label' => __( 'Back Description', 'clweb-elementor-flipbox2' ),
			'type' => Controls_Manager::TEXTAREA,
			'dynamic' => [
				'active' => true,
				],
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin ultricies sem lorem, non ullamcorper neque tincidunt id.', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->end_controls_section();

		/*
		Typography tab
		================================================================================
		*/
		$this->start_controls_section(
			'section_typo',
			[
				'label' => __( 'Typography', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_group_control(//Add group control to perform typography for Front title.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_f_title_typo',
				'label' => __( 'Front Side Title Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__title-front',
			]
		);

		$this->add_group_control(	//Add group control to perform typography for Front description.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_f_desc_typo',
				'label' => __( 'Front Side Description Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__desc-front',
			]
		);

		$this->add_group_control(			//Add group control to perform typography for Back title.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_b_title_typo',
				'label' => __( 'Back Side Title Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__title-back',
			]
		);


		$this->add_group_control(			//Add group control to perform typography for Back description.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_b_desc_typo',
				'label' => __( 'Back Side Description Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__desc-back',
			]
		);

		$this->add_group_control(	//Add group control to perform typography for the Front Side Button.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_f_button_typo',
				'label' => __( 'Front Side Button Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__front-action a',
			]
		);

		$this->add_group_control(	//Add group control to perform typography for the Back Side Button.

			Group_Control_Typography::get_type(),
			[
				'name' => 'clweb_flipbox_b_button_typo',
				'label' => __( 'Back Side Button Typography', 'clweb-elementor-flipbox2' ),
				'selector' => '{{WRAPPER}} .clweb-flipbox__action a',
			]
		);

		$this->end_controls_section();

		/*
		color tab
		================================================================================
		*/
		$this->start_controls_section(
			'section_color',
			[
				'label' => __( 'Text Colors', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_f_title_color',
			[
				'label' => __( 'Front Side Title color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__title-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'clweb_flipbox_f_desc_color',
			[
				'label' => __( 'Front Side Description color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__desc-front ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'clweb_flipbox_b_title_color',
			[
				'label' => __( 'Back Side Title color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__title-back ' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'clweb_flipbox_b_desc_color',
			[
				'label' => __( 'Back Side Description color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__desc-back ' => 'color: {{VALUE}};',
				]
			]
		);


		$this->end_controls_section();

		/*
		Front Side Button settings tab
		================================================================================
		*/

		$this->start_controls_section(
			'front_side_section_button',
			[
				'label' => __( 'Front Side Button Settings', 'clweb-elementor-flipbox2' ),
			]
		);

		$this->add_control(
			'clweb_flipbox_show_front_btn',
			[
				'label' => __( 'Show Front Side Button?', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'clweb-elementor-flipbox2' ),
				'label_off' => __( 'Hide', 'clweb-elementor-flipbox2' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'clweb_flipbox_f_btn_text',
			[
				'label' => __( 'Button Text', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::TEXT,
				'default'     => __( 'Get Started', 'clweb-elementor-flipbox2' ),
			'placeholder' => __( 'Please enter front flipbox button text', 'clweb-elementor-flipbox2' ),
			'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'clweb_flipbox_f_btn_url',
			[
				'label' => __( 'Button URL', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'http://',
					'is_external' => '',
				],
				'show_external' => true,
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
			]
		);


		$this->add_control(
			'clweb_flipbox_f_btn_bg_color',
			[
				'label' => __( 'Button Background Color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96161',
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front-action a' => 'background-color: {{VALUE}};',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_f_btn_text_color',
			[
				'label' => __( 'Button Text Color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front-action a' => 'color: {{VALUE}};',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_f_btn_bg_color_hover',
			[
				'label' => __( 'Button Background Color On Hover', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fcb935',
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front-action a:hover' => 'background-color: {{VALUE}} !important;',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_f_btn_text_color_hover',
			[
				'label' => __( 'Button Text Color On Hover', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front-action a:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'front_button_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'clweb-elementor-flipbox2'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .clweb-flipbox__front-btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'front_button_margin',
			[
				'label'      => esc_html__('Margin', 'clweb-elementor-flipbox2'),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => ['px', 'em'],
				'selectors'  => [
					'{{WRAPPER}} .clweb-flipbox__front-btn' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'front_button_padding',
			[
				'label' => __( 'Button Padding', 'clweb-elementor-flipbox2' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', 'em', '%', 'rem'],
				'condition' => [
					'clweb_flipbox_show_front_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__front-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();


		/*
		Back Side Button settings tab
		================================================================================
		*/

		$this->start_controls_section(
			'back_side_section_button',
			[
				'label' => __( 'Back Side Button Settings', 'clweb-elementor-flipbox2' ),
			]
		);


		$this->add_control(
			'clweb_flipbox_show_back_btn',
			[
				'label' => __( 'Show Back Side Button?', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'clweb-elementor-flipbox2' ),
				'label_off' => __( 'Hide', 'clweb-elementor-flipbox2' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'clweb_flipbox_b_btn_text',
			[
				'label' => __( 'Button Text', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::TEXT,
				'default'     => __( 'Get Started', 'clweb-elementor-flipbox2' ),
			'placeholder' => __( 'Please enter the flipbox button text', 'clweb-elementor-flipbox2' ),
			'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
			]
		);

		$this->add_control(
			'clweb_flipbox_b_btn_url',
			[
				'label' => __( 'Button URL', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::URL,
				'default' => [
					'url' => 'http://',
					'is_external' => '',
				],
				'show_external' => true,
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
			]
		);


		$this->add_control(
			'clweb_flipbox_b_btn_bg_color',
			[
				'label' => __( 'Button Background Color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f96161',
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__action a' => 'background-color: {{VALUE}};',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_b_btn_text_color',
			[
				'label' => __( 'Button Text Color', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#ffffff',
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__action a' => 'color: {{VALUE}};',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_b_btn_bg_color_hover',
			[
				'label' => __( 'Button Background Color On Hover', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#fcb935',
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__action a:hover' => 'background-color: {{VALUE}} !important;',
				]
			]
		);


		$this->add_control(
			'clweb_flipbox_b_btn_text_color_hover',
			[
				'label' => __( 'Button Text Color On Hover', 'clweb-elementor-flipbox2' ),
				'type' => Controls_Manager::COLOR,
				'default' => '#f7f7f7',
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__action a:hover' => 'color: {{VALUE}};',
				]
			]
		);

		$this->add_control(
			'button_border_radius',
			[
				'label'      => esc_html__('Border Radius', 'clweb-elementor-flipbox2'),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => ['px'],
				'range'      => [
					'px' => [
						'min'  => 0,
						'step' => 1,
						'max'  => 100,
					],
				],
				'selectors'  => [
					'{{WRAPPER}} .clweb-flipbox__btn' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'button_padding',
			[
				'label' => __( 'Button Padding', 'clweb-elementor-flipbox2' ),
				'type' => 'dimensions',
				'size_units' => [ 'px', 'em', '%', 'rem'],
				'condition' => [
					'clweb_flipbox_show_back_btn' => 'yes',
				],
				'selectors' => [
					'{{WRAPPER}} .clweb-flipbox__btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		$clweb_bg_img_front =       $settings['clweb_flipbox_f_bg_img'];
		$clweb_bg_img_back =        $settings['clweb_flipbox_b_bg_img'];
		$clweb_icon_front =         $settings['clweb_flipbox_f_icon'];
		$clweb_icon_back =          $settings['clweb_flipbox_b_icon'];
		$clweb_flipbox_show_front_btn =   $settings['clweb_flipbox_show_front_btn'];
		$clweb_flipbox_show_back_btn =   $settings['clweb_flipbox_show_back_btn'];
		$clweb_flipbox_f_bg_color = $settings['clweb_flipbox_f_bg_color'];

		$clweb_icon_front_id =    $clweb_icon_front["id"];
		$clweb_icon_front_alt =   get_post_meta($clweb_icon_front_id, '_wp_attachment_image_alt', TRUE);
		$clweb_icon_front_title = get_the_title($clweb_icon_front_id);

		$clweb_icon_back_id =     $clweb_icon_back["id"];
		$clweb_icon_back_alt =    get_post_meta($clweb_icon_back_id, '_wp_attachment_image_alt', TRUE);
		$clweb_icon_back_title =  get_the_title($clweb_icon_back_id);


		echo '<div id="flip-demo-0" class="clweb-flipbox '.$settings['clweb_flipbox_style'].' clweb-flipbox--'.$settings['clweb_flipbox_type'].'" onclick="">';
	  echo '    <div class="clweb-flipbox__holder" >';
	  echo '        <div class="clweb-flipbox__front" style=" background-color:'.$clweb_flipbox_f_bg_color.';background-image: url('.$clweb_bg_img_front['url'].');">';

	  echo '            <div class="clweb-flipbox__content">';
	  echo '                <div class="clweb-flipbox__icon-front">';

	  echo '                    <img alt="'.$clweb_icon_front_alt.'" title="'. $clweb_icon_front_title .'" src="'.$clweb_icon_front["url"].'"/>';

	  echo '                </div>';
	  echo '                <' . esc_html($settings['title_tag']) . ' class="clweb-flipbox__title-front">'.$settings['clweb_flipbox_f_title'].'</' . esc_html($settings['title_tag']) . '>';
	  echo '                <' . esc_html($settings['content_tag']) . ' class="clweb-flipbox__desc-front">'.$settings['clweb_flipbox_f_desc'].'</' . esc_html($settings['content_tag']) . '>';
													// Front side button
													if($clweb_flipbox_show_front_btn == "yes"){
		echo '               		<div class="clweb-flipbox__front-action">';
														$btn_external = "";
														$btn_nofollow = "";
														if( $settings['clweb_flipbox_f_btn_url']['is_external'] ) {
															$btn_external = ' target="_blank" ';
														}
	
														if( $settings['clweb_flipbox_f_btn_url']['nofollow'] ) {
															$btn_nofollow = ' rel="nofollow" ';
														}
	
		echo '                    <a ' . $btn_external . ' ' . $btn_nofollow . ' href="'.$settings['clweb_flipbox_f_btn_url']['url'].'" class="clweb-flipbox__front-btn">'.$settings['clweb_flipbox_f_btn_text'].'</a>';
		echo '                   </div>';
		}
	  echo '            </div>';
	  echo '        </div>';
	  echo '        <div class="clweb-flipbox__back" style="background-image: url('.$clweb_bg_img_back['url'].');" >';

	  echo '            <div class="clweb-flipbox__content">';
		echo '                <div class="clweb-flipbox__icon-back">';
	  echo '                    <img alt="'.$clweb_icon_back_alt.'" title="'. $clweb_icon_back_title .'"  src="'.$clweb_icon_back["url"].'"/>';
	  echo '                </div>';
	  echo '                <' . esc_html($settings['title_tag']) . ' class="clweb-flipbox__title-back">'.$settings['clweb_flipbox_b_title'].'</' . esc_html($settings['title_tag']) . '>';
		echo '                <' . esc_html($settings['content_tag']) . ' class="clweb-flipbox__desc-back">'.$settings['clweb_flipbox_b_desc'].'</' . esc_html($settings['content_tag']) . '>';
													if($clweb_flipbox_show_back_btn == "yes"){
		echo '               		<div class="clweb-flipbox__action">';
														$btn_external = "";
														$btn_nofollow = "";
														if( $settings['clweb_flipbox_b_btn_url']['is_external'] ) {
															$btn_external = ' target="_blank" ';
														}

														if( $settings['clweb_flipbox_b_btn_url']['nofollow'] ) {
															$btn_nofollow = ' rel="nofollow" ';
														}

	  echo '                    <a ' . $btn_external . ' ' . $btn_nofollow . ' href="'.$settings['clweb_flipbox_b_btn_url']['url'].'" class="clweb-flipbox__btn">'.$settings['clweb_flipbox_b_btn_text'].'</a>';
	  echo '                   </div>';
		}
	  echo '                </div>';
	  echo '            </div>';

	  echo '        </div>';
	  echo '    </div>';
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>
		<div class="title">
				{{{ settings.title }}}
		</div>


		<div id="flip-demo-0" class="clweb-flipbox clweb-flipbox--{{settings.clweb_flipbox_type}} {{settings.clweb_flipbox_style}}"
			onclick="">
			<div class="clweb-flipbox__holder">
				<div class="clweb-flipbox__front">

					<div class="clweb-flipbox__content">
						<div class="clweb-flipbox__icon-front">
							<img src="{{settings.clweb_flipbox_f_icon.url}}" />
						</div>
						<{{{ settings.title_tag }}} class="clweb-flipbox__title-front">{{{ settings.clweb_flipbox_f_title }}}
						</{{{ settings.title_tag }}}>
						<{{{ settings.content_tag }}} class="clweb-flipbox__desc-front">{{{ settings.clweb_flipbox_f_desc }}}
						</{{{ settings.content_tag }}}>
						<# if ( settings.clweb_flipbox_show_front_btn=='yes' ) { #>
							<div class="clweb-flipbox__front-action">
								<a 
									href="{{ settings.clweb_flipbox_f_btn_url.url}}" 
									class="clweb-flipbox__front-btn">{{{ settings.clweb_flipbox_f_btn_text }}}>
								</a>
							</div>
						<# } #>
					</div>
				</div>
				<div class="clweb-flipbox__back">

					<div class="clweb-flipbox__content">
						<div class="clweb-flipbox__icon-back">
							<img src="{{settings.clweb_flipbox_b_icon.url}}" />
						</div>
							<{{{ settings.title_tag }}} class="clweb-flipbox__title-back">{{{ settings.clweb_flipbox_b_title }}}
							</{{{ settings.title_tag }}}>
							<{{{ settings.content_tag }}} class="clweb-flipbox__desc-back">{{{ settings.clweb_flipbox_b_desc }}}
							</{{{ settings.content_tag }}}>
							<# if ( settings.clweb_flipbox_show_back_btn=='yes' ) { #>
								<div class="clweb-flipbox__action">
									<a href="{{ settings.clweb_flipbox_b_btn_url.url}}" class="clweb-flipbox__btn">{{{ settings.clweb_flipbox_b_btn_text }}}</a>
								</div>
							<# } #>
					</div>
				</div>
			</div>
    <?php
	}

}