<?php
$this->title = 'Resend verification email';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-resend-verification-email">
   

    <p class="text-center"><?=__('Please fill out your email. A verification email will be sent there.');?></p>

    
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

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