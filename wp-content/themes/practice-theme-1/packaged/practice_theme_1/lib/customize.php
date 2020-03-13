<?php
  function practice_theme_1_customize_register( $wp_customize ){

    $wp_customize->get_setting('blogname')->transport = 'postMessage';

    $wp_customize->selective_refresh->add_partial('blogname', array(
      // 'settings' => array('blogname')
      'selector' => '.c-header__blogname',
      'container_inclusive' => false,
      'render_callback' => function() {
        bloginfo( 'name' );
      }
    ));
/* ******************* SINGLE SETTINGS  ****************** */

    $wp_customize->add_section('practice_theme_1_single_blog_options', array(
      'title' => esc_html__( 'Single Blog Options', 'practice_theme_1' ),
      'description' => esc_html__( 'You can adjust single blog options here.', 'practice_theme_1' ),
      'active_callback' => 'practice_theme_1_show_single_blog_section'
    ));

    $wp_customize->add_setting('practice_theme_1_display_author_info', array(
      'default' => true,
      'transport' => 'postMessage',
      'sanitize_callback' => 'practice_theme_1_sanitize_checkbox'
    ));

    $wp_customize->add_control('practice_theme_1_display_author_info', array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Show Author Info', 'practice_theme_1'),
      'section' => 'practice_theme_1_single_blog_options'
    ));

/* ******************* GENERAL OPTIONS  ****************** */

    $wp_customize->add_section('practice_theme_1_general_options', array(
      'title' => esc_html__( 'General Options', 'practice_theme_1' ),
      'description' => esc_html__( 'You can adjust general options here.', 'practice_theme_1' )
    ));

    $wp_customize->add_setting('practice_theme_1_accent_color', array(
      'default' => '#20ddae',
      'transport' => 'postMessage',
      'sanitize_callback' => 'sanitize_hex_color'
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'practice_theme_1_accent_color', array(
      'label' => __('Accent Color', 'practice_theme_1'),
      'section' => 'practice_theme_1_general_options'
    )));

/* ****************** FOOTER SETTINGS  ******************* */

$wp_customize->selective_refresh->add_partial('practice_theme_1_footer_partial', array(
  'settings' => array('practice_theme_1_footer_bg', 'practice_theme_1_footer_layout'),
  'selector' => '#footer',
  'container_inclusive' => false,
  'render_callback' => function() {
    get_template_part('template-parts/footer/widgets');
    get_template_part('template-parts/footer/site-info');
  }
));

    $wp_customize->add_section('practice_theme_1_footer_options', array(
      'title' => esc_html__( 'Footer Options', 'practice_theme_1' ),
      'description' => esc_html__( 'You can adjust footer options here.', 'practice_theme_1' )
    ));

    $wp_customize->add_setting('practice_theme_1_site_info', array(
      'default' => '',
      'sanitize_callback' => 'practice_theme_1_sanitize_site_info',
      'transport' => 'postMessage'
    ));

    $wp_customize->add_control('practice_theme_1_site_info', array(
      'type' => 'text',
      'label' => esc_html__( 'Site Info', 'practice_theme_1'),
      'section' => 'practice_theme_1_footer_options'
    ));

    $wp_customize->add_setting('practice_theme_1_footer_bg', array(
        'default' => 'dark',
        'transport' => 'postMessage',
        'sanitize_callback' => 'practice_theme_1_sanitize_footer_bg'
    ));

    $wp_customize->add_control('practice_theme_1_footer_bg', array(
        'type' => 'select',
        'label' => esc_html__( 'Footer Background', 'practice_theme_1' ),
        'choices' => array(
            'light' => esc_html__( 'Light', 'practice_theme_1' ),
            'dark' => esc_html__( 'Dark', 'practice_theme_1' ),
        ),
        'section' => 'practice_theme_1_footer_options'
    ));

    $wp_customize->add_setting('practice_theme_1_footer_layout', array(
        'default' => '3,3,3,3',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
        'validate_callback' => 'practice_theme_1_validate_footer_layout'
    ));

    $wp_customize->add_control('practice_theme_1_footer_layout', array(
      'type' => 'text',
      'label' => esc_html__( 'Footer Columns', 'practice_theme_1'),
      'section' => 'practice_theme_1_footer_options'
    ));

  }
  add_action( 'customize_register', 'practice_theme_1_customize_register');

/* *********** FOOTER OPTION FUNCTIONS *************** */

  function practice_theme_1_validate_footer_layout($validity, $value) {
    if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/', $value)){
      $validity->add('invalid_footer_layout', esc_html__('Footer Layout is invalid.', 'practice_theme_1'));
    }
    return $validity;
  }

  function practice_theme_1_sanitize_footer_bg($input){
    $valid = array('light', 'dark');
    if(in_array($input, $valid, true)){
      return $input;
    }
    return 'dark';
  }

  function practice_theme_1_sanitize_site_info($input){
    $allowed = array('a' => array(
      'href' => array(),
      'title' => array()
    ));
    return wp_kses($input, $allowed);
  }

/* ********** SINGLE OPTION FUNCTIONS ***************** */

  function practice_theme_1_sanitize_checkbox($checked){
    return (isset($checked) && $checked === true) ? true : false;
  }

  function practice_theme_1_show_single_blog_section(){
    global $post;
    return is_single() && $post->post_type === 'post';
  }
?>
