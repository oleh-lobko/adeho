<?php

namespace elementorWidget;

use Elementor\Controls_Manager;
use Elementor\Widget_Base;
use Elementor\Utils;

class CustomSlider extends Widget_Base {

    public function get_name() { return 'custom_slider'; }
    public function get_title() { return __('Custom Slider', 'fwp'); }
    public function get_icon() { return 'eicon-slider-album'; }
    public function get_categories() { return ['general']; }

    protected function _register_controls() {
        $this->start_controls_section('content_section', [
            'label' => __('Content', 'fwp'),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]);

        $this->add_control('section_title', [
            'label' => __('Section Title', 'fwp'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Realisaties', 'fwp'),
        ]);

        $repeater = new \Elementor\Repeater();

        $repeater->add_control('title', [
            'label' => __('Title', 'fwp'),
            'type' => Controls_Manager::TEXT,
            'default' => __('Slide Title', 'fwp'),
        ]);

        $repeater->add_control('image', [
            'label' => __('Image', 'fwp'),
            'type' => Controls_Manager::MEDIA,
            'default' => [
                'url' => Utils::get_placeholder_image_src(),
            ],
        ]);

        $this->add_control('slider_items', [
            'label' => __('Slides', 'fwp'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => '{{{ title }}}',
        ]);

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $args = [
            'section_title' => $settings['section_title'],
            'slider_items'  => $settings['slider_items'],
        ];

        show_template('template', $args, str_replace(get_stylesheet_directory() . DIRECTORY_SEPARATOR, '', __DIR__));
    }
}
