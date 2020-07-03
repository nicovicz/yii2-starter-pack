<?php
$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-reset-password">
   

    <p class="text-center"><?=__('Please choose your new password:');?></p>

    
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'cpassword')->passwordInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>
                <div class="form-group">
                <?=Html::buttonIcon(__('Reset'),[
                    'type'=>'submit',
                    'icon'=>Icon::fa('key'),
                    'class'=>'btn btn-primary'
                ]);?>
                <?=Html::linkIcon('Kembali',to_route(['/site/login']),[
                    'icon'=>Icon::fa('arrow-circle-left'),
                    'class'=>'btn btn-warning'
                ]);?>
                </div>

            <?php ActiveForm::end(); ?>
   
</div>