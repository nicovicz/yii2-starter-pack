<?php
$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-request-password-reset">
    

    <p class="text-center">Please fill out your email. A link to reset password will be sent there.</p>

    
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>
                <div class="form-group">
                <?=Html::buttonIcon(__('Kirim'),[
                    'type'=>'submit',
                    'icon'=>Icon::fa('paper-plane'),
                    'class'=>'btn btn-primary'
                ]);?>
                <?=Html::linkIcon('Kembali',to_route(['/site/login']),[
                    'icon'=>Icon::fa('arrow-circle-left'),
                    'class'=>'btn btn-warning'
                ]);?>
                </div>

            <?php ActiveForm::end(); ?>
       
</div>