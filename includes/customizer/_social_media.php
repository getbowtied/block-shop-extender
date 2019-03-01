<?php 
// ---------------------------------------------
$section = 'social_media';

Kirki::add_field( 'block-shop', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Social Media', 'block-shop' ),
    'section'     => $section,
    'priority'    => 10,
    'row_label'     => array(
        'type'      => 'field',
        'value'     => esc_attr__('Social Media', 'block-shop' ),
        'field'     => 'platform',
    ),
    'button_label' => esc_attr__('Add New Social Media Platform', 'block-shop' ),
    'settings'     => 'social_media_platforms',
    'default'      => array(
        // 
    ),
    'fields' => array(
        'platform' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Platform', 'block-shop' ),
            'default'     => '',
            'choices'     => array(
                ''      => esc_attr__('Select Platform', 'block-shop'),
                    'facebook-circled' =>'Facebook',
                    'google-maps' =>'Google Maps',
                    'apple-app-store' =>'Apple App Store',
                    'google-play' =>'Google Play',
                    'behance' =>'Behance',
                    'foursquare' =>'Foursquare',
                    'github' =>'Github',
                    'help-center' =>'Help Center',
                    'line' =>'Line',
                    'reddit' =>'Reddit',
                    'tumblr' =>'Tumblr',
                    'viber' =>'Viber',
                    'vkcom' =>'Vkcom',
                    'weibo' =>'Weibo',
                    'whatsapp' =>'WhatsApp',
                    'wordpress' =>'WordPress',
                    'yelp' =>'Yelp',
                    'linkedin' =>'LinkedIn',
                    'medium' =>'Medium',
                    'google-plus-circled' =>'Google Plus Circled',
                    'pinterest' =>'Pinterest',
                    'facebook-messenger' =>'Facebook Messenger',
                    'twitter' =>'Twitter',
                    'instagram' =>'Instagram',
                    'youtube-play-button-logo' =>'Youtube Play',
            )
            // 'active_callback' => array(
            //     array(
            //         'setting'  => 'social_media_icon_type',
            //         'operator' => '==',
            //         'value'    => 'preset',     
            //     ),
            // )
        ),
        'url' => array(
            'type'        => 'url',
            'label'       => esc_attr__( 'URL', 'block-shop' ),
            'default'     => '',
        ),
    )
) );