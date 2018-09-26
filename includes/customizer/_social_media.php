<?php 
// ---------------------------------------------
$section = 'extender';

Kirki::add_field( 'storesix', array(
    'type'        => 'repeater',
    'label'       => esc_attr__( 'Social Media', 'storesix' ),
    'section'     => $section,
    'priority'    => 10,
    'row_label'     => array(
        'type'      => 'field',
        'value'     => esc_attr__('Social Media', 'storesix' ),
        'field'     => 'platform',
    ),
    'button_label' => esc_attr__('Add New Social Media Platform', 'storesix' ),
    'settings'     => 'social_media_platforms',
    'default'      => array(
        // 
    ),
    'fields' => array(
        'platform' => array(
            'type'        => 'select',
            'label'       => esc_attr__( 'Platform', 'storesix' ),
            'default'     => '',
            'choices'     => array(
                ''      => esc_attr__('Select Platform', 'storesix'),
                // A
                'airbnb' => 'airbnb' ,
                'amazon' => 'amazon' ,
                'amplement' => 'amplement' ,
                'android' => 'android' ,
                'angellist' => 'angellist' ,
                'app-net' => 'app-net' ,
                'apple' => 'apple' ,

                // B
                'baidu' => 'baidu' ,
                'bandcamp' => 'bandcamp' ,
                'bebo' => 'bebo' ,
                'behance' => 'behance' ,
                'blogger' => 'blogger' ,
                'buffer' => 'buffer' ,

                // C
                'coderwall' => 'coderwall' ,

                // D
                'dailymotion' => 'dailymotion' ,
                'deezer' => 'deezer' ,
                'delicious' => 'delicious' ,
                'deviantart' => 'deviantart' ,
                'digg' => 'digg' ,
                'disqus' => 'disqus' ,
                'douban' => 'douban' ,
                'draugiem' => 'draugiem' ,
                'dribbble' => 'dribbble' ,
                'drupal' => 'drupal' ,

                // E
                'ebay' => 'ebay' ,
                'ello' => 'ello' ,
                'eight-tracks' => 'eight-tracks' ,
                'endomondo' => 'endomondo' ,
                'envato' => 'envato' ,

                // F
                'facebook' => 'facebook' ,
                'feedburner' => 'feedburner' ,
                'filmweb' => 'filmweb' ,
                'five-hundred-px' => '500px' ,
                'flattr' => 'flattr' ,
                'flickr' => 'flickr' ,
                'forrst' => 'forrst' ,
                'foursquare' => 'foursquare' ,
                'friendfeed' => 'friendfeed' ,

                // G
                'github' => 'github' ,
                'goodreads' => 'goodreads' ,
                'google' => 'google' ,
                'google-play' => 'google-play' ,
                'google-plus' => 'google-plus' ,
                'grooveshark' => 'grooveshark' ,

                // H
                'houzz' => 'houzz' ,

                // I
                'icq' => 'icq' ,
                'identica' => 'identica' ,
                'imdb' => 'imdb' ,
                'instagram' => 'instagram' ,
                'istock' => 'istock' ,
                'itunes' => 'itunes' ,

                // J

                // K

                // L
                'lanyrd' => 'lanyrd' ,
                'last-fm' => 'last-fm' ,
                'linkedin' => 'linkedin' ,

                // M
                'mail' => 'mail' ,
                'medium' => 'medium' ,
                'meetup' => 'meetup' ,
                'mixcloud' => 'mixcloud' ,
                'model-mayhem' => 'model-mayhem' ,
                'mozilla-persona' => 'mozilla-persona' ,
                'mumble' => 'mumble' ,
                'myspace' => 'myspace' ,

                // N
                'newsvine' => 'newsvine' ,

                // O
                'odnoklassniki' => 'odnoklassniki' ,
                'openid' => 'openid' ,
                'outlook' => 'outlook' ,

                // P
                'patreon' => 'patreon' ,
                'paypal' => 'paypal' ,
                'periscope' => 'periscope' ,
                'pinterest' => 'pinterest' ,
                'playstation' => 'playstation' ,
                'play-store' => 'play-store' ,
                'pocket' => 'pocket' ,

                // Q
                'qq' => 'qq' ,
                'quora' => 'quora' ,

                // R
                'raidcall' => 'raidcall' ,
                'ravelry' => 'ravelry' ,
                'reddit' => 'reddit' ,
                'renren' => 'renren' ,
                'resident-advisor' => 'resident-advisor' ,
                'rss' => 'rss' ,

                // S
                'sharethis' => 'sharethis' ,
                'skype' => 'skype' ,
                'slideshare' => 'slideshare' ,
                'smugmug' => 'smugmug' ,
                'snapchat' => 'snapchat' ,
                'soundcloud' => 'soundcloud' ,
                'spotify' => 'spotify' ,
                'stackexchange' => 'stackexchange' ,
                'stackoverflow' => 'stackoverflow' ,
                'stayfriends' => 'stayfriends' ,
                'steam' => 'steam' ,
                'storehouse' => 'storehouse' ,
                'stumbleupon' => 'stumbleupon' ,
                'swarm' => 'swarm' ,

                // T
                'teamspeak' => 'teamspeak' ,
                'teamviewer' => 'teamviewer' ,
                'technorati' => 'technorati' ,
                'telegram' => 'telegram' ,
                'tripadvisor' => 'tripadvisor' ,
                'tripit' => 'tripit' ,
                'triplej' => 'triplej' ,
                'tumblr' => 'tumblr' ,
                'twitch' => 'twitch' ,
                'twitter' => 'twitter' ,

                // U

                // V
                'ventrilo' => 'ventrilo' ,
                'viadeo' => 'viadeo' ,
                'vimeo' => 'vimeo' ,
                'vine' => 'vine' ,
                'viber' => 'viber' ,
                'vkontakte' => 'vkontakte' ,

                // W
                'weibo' => 'weibo' ,
                'whatsapp' => 'whatsapp' ,
                'wikipedia' => 'wikipedia' ,
                'windows' => 'windows' ,
                'wordpress' => 'wordpress' ,
                'wykop' => 'wykop' ,

                // X
                'xbox' => 'xbox' ,
                'xing' => 'xing' ,

                // Y
                'yahoo' => 'yahoo' ,
                'yammer' => 'yammer' ,
                'yandex' => 'yandex' ,
                'yelp' => 'yelp' ,
                'younow' => 'younow' ,
                'youtube' => 'youtube' ,

                // Z
                'zerply' => 'zerply' ,
                'zomato' => 'zomato' ,
                'zynga' => 'zynga' 
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
            'label'       => esc_attr__( 'URL', 'storesix' ),
            'default'     => '',
        ),
    )
) );