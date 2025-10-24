<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => getenv('DEBUG_MODE') === 'false',

    'yaml.handler' => 'symfony', // already makes use of the more modern Symfony YAML parser: https://getkirby.com/docs/reference/system/options/yaml (will become the default in a future Kirby version)

    'cache' => [
        'pages' => [
            // Cache désactivé en debug, activé sinon
            'active' => getenv('DEBUG_MODE') !== 'true',
        ],
    ],
    'panel' => [
        'vue' => [
            'compiler' => false
        ]
    ],

    // Email configuration
    // Les credentials SMTP sont dans les variables d'environnement (.user.ini sur le serveur)
    'email' => [
        'presets' => [
            'contact' => [
                'from' => 'b.coste@qualityteam.fr',
                'subject' => 'Nouveau message de contact - QualityTeam'
            ]
        ],
        'transport' => getenv('SMTP_PASSWORD') ? [
            'type'     => 'smtp',
            'host'     => getenv('SMTP_HOST') ?: 'ssl0.ovh.net',
            'port'     => (int)(getenv('SMTP_PORT') ?: 465),
            'security' => 'ssl',
            'auth'     => true,
            'username' => getenv('SMTP_USERNAME') ?: 'b.coste@qualityteam.fr',
            'password' => getenv('SMTP_PASSWORD')
        ] : null,  // Pas de SMTP en local si variables non définies
    ],
    'routes' => [
        [
            'pattern' => 'sitemap.xml',
            'action'  => function () {
                $pages = site()->pages()->index();

                // fetch the pages to ignore from the config settings,
                // if nothing is set, we ignore the error page
                $ignore = kirby()->option('sitemap.ignore', ['error']);

                $content = snippet('sitemap', compact('pages', 'ignore'), true);

                // return response with correct header type
                return new Kirby\Cms\Response($content, 'application/xml');
            }
        ],
        [
            'pattern' => 'sitemap',
            'action'  => function () {
                return go('sitemap.xml', 301);
            }
        ]
    ]
];
