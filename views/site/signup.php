<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use app\widgets\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
   

    <p>Please fill out the following fields to signup:</p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                <?=Html::submitButtonIcon('Daftar','level-up-alt','btn btn-primary');?>
                <?=Html::linkButtonIcon('Kembali',['/site/login'],'arrow-circle-left','btn btn-warning');?>
                </div>

            <?php ActiveForm::end(); ?>
       
</div>