<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use app\assets\AppAsset;

AppAsset::register($this);
$logo = Yii::getAlias('@web').'/img-static/logo2.png';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode(Yii::$app->name) ?> - <?= Html::encode($this->title) ?></title>
    <link rel="shortcut icon" href="<?=Yii::getAlias('@web');?>/img-static/logo.png" type="image/x-icon">
    <link rel="icon" href="<?=Yii::getAlias('@web');?>/img-static/logo.png" type="image/x-icon">
    <?php $this->head() ?>
</head>
<body class="bg-gradient-primary">
<?php $this->beginBody() ?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
              <h1 class="h4 text-gray-900 mt-4 text-center">ADMIN PANEL</h1>

              <h1 class="h4 text-gray-900 mt-4 text-center"><?=Yii::$app->params['companyName'];?></h1>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <?=Alert::widget();?>
                  <?=$content;?>
                 
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
