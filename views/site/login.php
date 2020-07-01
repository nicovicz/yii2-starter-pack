<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use app\widgets\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <p><?=__('Please fill out the following fields to login');?></p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <p class="text-center">
            <?=Html::submitButtonIcon('Login','sign-in-alt','btn btn-primary');?>
            <?=Html::linkButtonIcon('Daftar',['/site/signup'],'level-up-alt','btn btn-success');?>
            <?=Html::linkButtonIcon('Lupa Password',['/site/request-password-reset'],'key','mt-2 btn btn-warning');?>
            </p>
            
        </div>

    <?php ActiveForm::end(); ?>

    
</div>
