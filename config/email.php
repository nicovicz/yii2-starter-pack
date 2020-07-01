<?php
return [
    'class' => 'yii\swiftmailer\Mailer',
    'transport'=>[
        'class'=>'Swift_SmtpTransport',
        'host'=>'in-v3.mailjet.com',
        'username'=>'14ffd891f836497b61a0bbae643a0e6e',
        'password'=>'240be36db364f67413410e45b49eaf8c',
        'port' => '587' ,
        'encryption' => 'tls' ,
    ],
    'useFileTransport' => false,
];