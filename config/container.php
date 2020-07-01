<?php
return [
   
    'yii\widgets\LinkPager'=>[
        'maxButtonCount'=>5,
    ],
    'yii\data\Pagination'=>[
        'pageSize'=>10
    ],
    'yii\grid\SerialColumn'=>[
        'header'=>'No.',
        'contentOptions'=>['class'=>'text-center','style'=>'vertical-align:middle']
    ],
    'yii\grid\ActionColumn'=>[
        'header'=>'Aksi',
        'headerOptions'=>['class'=>'text-center'],
        'contentOptions'=>['class'=>'text-center action','style'=>'vertical-align:middle']
    ],
];?>