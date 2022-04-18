<?php

namespace Runig006\InvertSlug;


use Flarum\Extend;
use s9e\TextFormatter\Configurator;

return [
    (new Extend\Formatter)
        ->configure(function (Configurator $config) {
            $config->MediaEmbed->defaultSites->delete('youtube');
            $config->MediaEmbed->add(
                'youtube',
                [
                    'host'    => ['youtube.com', 'youtu.be'],
                    'extract' => [
                        "!youtube\\.com/watch\\?v=(?'id'[-0-9A-Z_a-z]+)!",
                        "!youtu\\.be/(?'id'[-0-9A-Z_a-z]+)!"
                    ],
                    'iframe'  => [
                        'width'    => 560,
                        'height'   => 315,
                        'src'      => 'https://piped.kavin.rocks/embed/{@id}?autoplay=0',
                        'autoplay' => 0,
                    ]
                ]
            );
        })
];
