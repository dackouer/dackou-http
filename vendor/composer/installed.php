<?php return array(
    'root' => array(
        'name' => 'dackou/http',
        'pretty_version' => '1.0.0+no-version-set',
        'version' => '1.0.0.0',
        'reference' => null,
        'type' => 'l',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'curl/curl' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'f207b53643ad176448c6e9644ee91d5557b1c32c',
            'type' => 'library',
            'install_path' => __DIR__ . '/../curl/curl',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'dackou/http' => array(
            'pretty_version' => '1.0.0+no-version-set',
            'version' => '1.0.0.0',
            'reference' => null,
            'type' => 'l',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
    ),
);
