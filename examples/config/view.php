<?php

return [
    'smarty' => [
        'template_dir' => base_path('app/View'),
        'compile_dir' => base_path('app/View/Compile'),
        'config_dir' => base_path('app/View/Config'),
        'cache_dir' => base_path('app/View/Cache'),
        'plugin_dir' => base_path('app/View/Plugin'),
        'caching' => 1,
        'left_delimiter' => '{%',
        'right_delimiter' => '%}',
    ]
];
