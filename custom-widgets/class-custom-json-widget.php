<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; 
}

class Custom_JSON_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'custom_json_widget';
    }

    public function get_title() {
        return __( 'Custom JSON Widget', 'text-domain' );
    }

    public function get_icon() {
        return 'eicon-code';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'text-domain' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'json_url',
            [
                'label' => __( 'JSON URL', 'text-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'input_type' => 'url',
                'default' => 'https://hr.tecnocapital.it/api/profili-aperti/it',
                'placeholder' => __( 'Enter your JSON endpoint URL', 'text-domain' ),
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $json_url = $settings['json_url'];

        if ( ! empty( $json_url ) ) {
            echo '<div class="json-data" data-json-url="' . esc_url( $json_url ) . '"></div>';
        } else {
            echo __( 'Please provide a valid JSON URL.', 'text-domain' );
        }
    }

    public function _content_template() {}
}