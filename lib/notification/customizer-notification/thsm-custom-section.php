<?php
if (class_exists('WP_Customize_Section')) {

    class Top_Store_Custom_Section_Class extends WP_Customize_Section {
        public $type = 'ts_themehunk_customizer_custom_section';

        protected function render_template() {
            ?>
            <# if (data.title) { #>
            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    <span class="section-title">
                        {{ data.title }}
                    </span>
                </h3>
                <div class="ts-themehunk-custom-section">
                    <?php
                    // Add your buttons here based on the plugin status
                    // Retrieve the theme support data
                    $plugin_data = get_theme_support('recommend-plugins');

                // Check if the theme support exists and has the plugin data

                    $plugin_data = $plugin_data[0];

                    // Get the specific plugin data
                    $hunk_companion = isset($plugin_data['hunk-companion']) ? $plugin_data['hunk-companion'] : array();
                    $th_shop_mania_pro = isset($hunk_companion['pro-plugin']) ? $hunk_companion['pro-plugin'] : array();

                    // Extract the values
                    $plugin_pro_slug = isset($th_shop_mania_pro['slug']) ? $th_shop_mania_pro['slug'] : 'top-store-pro';
                    $plugin_pro_file = isset($th_shop_mania_pro['init']) ? $th_shop_mania_pro['init'] : 'top-store-pro/top-store-pro';
                    $plugin_companion_slug = isset($plugin_data['hunk-companion']['slug']) ? $plugin_data['hunk-companion']['slug'] : 'hunk-companion';
                    $plugin_companion_file = isset($plugin_data['hunk-companion']['active_filename']) ? $plugin_data['hunk-companion']['active_filename'] : '';

                    $plugin_pro_installed = is_plugin_active($plugin_pro_file);
                    $plugin_pro_exists = file_exists(WP_PLUGIN_DIR . '/' . $plugin_pro_file);
                    $plugin_companion_installed = is_plugin_active($plugin_companion_file);
                    $plugin_companion_exists = file_exists(WP_PLUGIN_DIR . '/' . $plugin_companion_file);

                    $go_to_starter_sites_disabled = true;

                    if ($plugin_pro_exists) {
                        if ($plugin_pro_installed) {
                            $go_to_starter_sites_disabled = false;
                        } else {
                            echo '<p>'. esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the TH Shop Mania Pro', 'top-store') .'</p><button class="button button-primary" id="activate-top-store-pro" data-slug="' . esc_attr($plugin_pro_slug) . '"><span class="text">'. esc_html__('Activate', 'top-store') .'</span><span class="icon dashicons dashicons-update th-loader"></span></button>';
                        }
                    } elseif ($plugin_companion_exists) {
                        if ($plugin_companion_installed) {
                            $go_to_starter_sites_disabled = false;
                        } else {
                            echo '<p>'. esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the Hunk Companion', 'top-store') .'</p><button class="button button-primary" id="activate-hunk-companion" data-slug="' . esc_attr($plugin_companion_slug) . '"><span class="text">'. esc_html__('Activate', 'top-store') .'</span><span class="icon dashicons dashicons-update th-loader"></span></button>';
                        }
                    } else {
                        echo '<p>'. esc_html__('To take full advantage of all the features this theme has to offer, please install and activate the Hunk Companion', 'top-store') .'</p><button class="button button-primary" id="install-hunk-companion" data-slug="' . esc_attr($plugin_companion_slug) . '"><span class="text">'. esc_html__('Install Now', 'top-store') .'</span><span class="icon dashicons dashicons-update th-loader"></span></button>';
                    }

                    // Go to Starter Sites button (always present, conditionally enabled/disabled)
                    echo '<button class="button button-primary" id="go-to-starter-sites" ' . ($go_to_starter_sites_disabled ? 'disabled' : '') . '>' . esc_html__('Go to Starter Sites', 'top-store') . '</button>';
                    ?>
                </div>
            </li>
            <# } #>
            <?php
        }
    }
}

function top_store_customize_install_register($wp_customize) {
    $wp_customize->register_section_type('Top_Store_Custom_Section_Class');

    $wp_customize->add_section(
        new Top_Store_Custom_Section_Class(
            $wp_customize,
            'ts_themehunk_customizer_custom_section',
            array(
                'title' => __('Thank You for installing Top Store Theme', 'top-store'),
                'priority' => 0,
            )
        )
    );
}
add_action('customize_register', 'top_store_customize_install_register');

get_template_part( 'lib/notification/customizer-notification/customizer-install');