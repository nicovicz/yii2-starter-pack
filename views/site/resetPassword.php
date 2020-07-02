<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use app\widgets\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
   

    <p>Please choose your new password:</p>

    
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                <?=Html::submitButtonIcon('Simpan','key','btn btn-primary');?>
                <?=Html::linkButtonIcon('Kembali',['/site/login'],'arrow-circle-left','btn btn-warning');?>
                </div>

            <?php ActiveForm::end(); ?>
   
</div>