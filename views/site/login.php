<?php

/* @var $this yii\web\View */

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <p class="text-center"><?=__('Please fill out the following fields to login');?></p>

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <p class="text-center">
            <?=Html::submitButton(__('Login'),[
                'class' => 'btn btn-primary btn-block' 
            ]);?>
            </p>
            <hr/>
            <div class="text-center"><?=Html::a(__('Daftar'),to_route(['/site/signup']),['class'=>'small']);?></div>
            <div class="text-center"><?=Html::a(__('Lupa Password'),to_route(['/site/request-password-reset']),['class'=>'small']);?></div>
            <div class="text-center"><?=Html::a(__('Kirim Ulang Verifikasi'),to_route(['/site/resend-verification-email']),['class'=>'small']);?></div>
            </p>
           
            
        </div>

    <?php ActiveForm::end(); ?>

    
</div>
