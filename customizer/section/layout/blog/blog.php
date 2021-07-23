<?php
/**
 *Blog Option
 /*******************/
//blog post content
/*******************/
    $wp_customize->add_setting('top_store_blog_post_content', array(
        'default'        => 'excerpt',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
    $wp_customize->add_control('top_store_blog_post_content', array(
        'settings' => 'top_store_blog_post_content',
        'label'   => __('Blog Post Content','top-store'),
        'section' => 'top-store-section-blog-group',
        'type'    => 'select',
        'choices'    => array(
        'full'   => __('Full Content','top-store'),
        'excerpt' => __('Excerpt Content','top-store'), 
        'nocontent' => __('No Content','top-store'), 
        ),
         'priority'   =>9,
    ));
    // excerpt length
    $wp_customize->add_setting('top_store_blog_expt_length', array(
			'default'           =>'30',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'top_store_sanitize_number',
		)
	);
	$wp_customize->add_control('top_store_blog_expt_length', array(
			'type'        => 'number',
			'section'     => 'top-store-section-blog-group',
			'label'       => __( 'Excerpt Length', 'top-store' ),
			'input_attrs' => array(
				'min'  => 0,
				'step' => 1,
				'max'  => 3000,
			),
             'priority'   =>10,
		)
	);
	// read more text
    $wp_customize->add_setting('top_store_blog_read_more_txt', array(
			'default'           =>'Read More',
            'capability'        => 'edit_theme_options',
			'sanitize_callback' =>'top_store_sanitize_text',
            'transport'         => 'postMessage',
		)
	);
	$wp_customize->add_control('top_store_blog_read_more_txt', array(
			'type'        => 'text',
			'section'     => 'top-store-section-blog-group',
			'label'       => __( 'Read More Text', 'top-store' ),
			'settings' => 'top_store_blog_read_more_txt',
             'priority'   =>11,
			
		)
	);
    /*********************/
    //blog post pagination
    /*********************/
   $wp_customize->add_setting('top_store_blog_post_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
    $wp_customize->add_control('top_store_blog_post_pagination', array(
        'settings' => 'top_store_blog_post_pagination',
        'label'   => __('Post Pagination','top-store'),
        'section' => 'top-store-section-blog-group',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','top-store'),
        'click'   => __('Load More (Pro)','top-store'), 
        'scroll'  => __('Infinite Scroll (Pro)','top-store'), 
        ),
        'priority'   =>13,
    ));
/****************/
//blog doc link
/****************/
$wp_customize->add_setting('top_store_blog_arch_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_blog_arch_learn_more',
            array(
        'section'    => 'top-store-section-blog-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#blog-setting',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));