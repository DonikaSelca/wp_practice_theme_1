<?php
  function practice-theme-1_customize_register( $wp_customize ){

    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
      // 'settings' => array('blogname')
      'selector' => '.c-header__blogname',
      'container_inclusive' => false,
      'render_callback' => function() {
        bloginfo( 'name' );
      }
    ));

    $wp_customize->selective_refresh->add_partial('practice-theme-1_footer_partial', array(
      'settings' => array('practice-theme-1_footer_bg', 'practice-theme-1_footer_layout'),
      'selector' => '#footer',
      'container_inclusive' => false,
      'render_callback' => function() {
        get_template_part('template-parts/footer/widgets');
        get_template_part('template-parts/footer/site-info');
      }
    ));
    $wp_customize->add_section('practice-theme-1_general_options', array(
      'title' => esc_html__( 'General Options', 'practice-theme-1' ),
      'description' => esc_html__( 'You can adjust general options here.', 'practice-theme-1' )
    ));

    $wp_customize->add_setting('practice-theme-1_accent_color', array(
      'default' => '#20ddae',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'practice-theme-1_accent_color', array(
      'label' => __('Accent Color', 'practice-theme-1'),
      'section' => 'practice-theme-1_general_options'
    )));

    $wp_customize->add_section('practice-theme-1_footer_options', array(
      'title' => esc_html__( 'Footer Options', 'practice-theme-1' ),
      'description' => esc_html__( 'You can adjust footer options here.', 'practice-theme-1' )
    ));

    $wp_customize->add_setting('practice-theme-1_site_info', array(
      'default' => '',
      'sanitize_callback' => 'practice-theme-1_sanitize_site_info',
      'transport' => 'postMessage'
    ));

    $wp_customize->add_control('practice-theme-1_site_info', array(
      'type' => 'text',
      'label' => esc_html__( 'Site Info', 'practice-theme-1'),
      'section' => 'practice-theme-1_footer_options'
    ));

    $wp_customize->add_setting('practice-theme-1_footer_bg', array(
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => 'practice-theme-1_sanitize_footer_bg'
    ));

    $wp_customize->add_control('practice-theme-1_footer_bg', array(
        'type' => 'select',
        'label' => esc_html__( 'Footer Background', 'practice-theme-1' ),
        'choices' => array(
            'light' => esc_html__( 'Light', 'practice-theme-1' ),
            'dark' => esc_html__( 'Dark', 'practice-theme-1' ),
        ),
        'section' => 'practice-theme-1_footer_options'
    ));

    $wp_customize->add_setting('practice-theme-1_footer_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'practice-theme-1_validate_footer_layout'
    ));

    $wp_customize->add_control('practice-theme-1_footer_layout', array(
      'type' => 'text',
      'label' => esc_html__( 'Footer Columns', 'practice-theme-1'),
      'section' => 'practice-theme-1_footer_options'
    ));

  }
  add_action( 'customize_register', 'practice-theme-1_customize_register');

  function practice-theme-1_validate_footer_layout($validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)){
      $validity->add('invalid_footer_layout', esc_html__('Footer Layout is invalid.', 'practice-theme-1'));
    }
    return $validity;
  }

  function practice-theme-1_sanitize_footer_bg($input){
    $valid = array('light', 'dark');
    if(in_array($input, $valid, true)){
      return $input;
    }
    return 'dark';
  }

  function practice-theme-1_sanitize_site_info($input){
    $allowed = array('a' => array(
      'href' => array(),
      'title' => array()
    ));
    return wp_kses($input, $allowed);
  }
?>
