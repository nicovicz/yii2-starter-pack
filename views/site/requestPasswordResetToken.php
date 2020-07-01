<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use app\widgets\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    

    <p>Please fill out your email. A link to reset password will be sent there.</p>

    
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                <?=Html::submitButtonIcon('Kirim','paper-plane','btn btn-primary');?>
                <?=Html::linkButtonIcon('Kembali',['/site/login'],'arrow-circle-left','btn btn-warning');?>
                </div>

            <?php ActiveForm::end(); ?>
       
</div>