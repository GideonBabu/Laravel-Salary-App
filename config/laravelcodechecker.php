<?php

return [
    'php-cli' => 'php',
    'phpcs' => base_path('vendor\squizlabs\php_codesniffer\bin\phpcs'),
    'phpcbf' => base_path('vendor\squizlabs\php_codesniffer\bin\phpcbf'),
    'phpcs_standard' => '--standard=config\phpcs\\',
    'phpmd' => base_path('vendor\bin\phpmd'),
    'phpmd_standard' => 'config\phpmd\rulesets\cleancode.xml'.
        ',config\phpmd\rulesets\codesize.xml'.
        ',config\phpmd\rulesets\controversial.xml'.
        ',config\phpmd\rulesets\design.xml'.
        ',config\phpmd\rulesets\naming.xml'.
        ',config\phpmd\rulesets\unusedcode.xml',
    'phpcs_target' => 'tests routes config app',
    'phplint_target' => 'tests routes config app',
    'phpmd_target' => 'tests routes config app',
];
