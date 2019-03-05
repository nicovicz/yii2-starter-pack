<?php
return [
    'Registration' => [
        'class' => 'app\modules\Registration\Module',
    ],
    'master' => [
        'class' => 'app\modules\master\Module',
        'modules'=>[
            'category' => [
                'class' => 'app\modules\master\modules\category\Module',
            ],
        ]
    ],
];