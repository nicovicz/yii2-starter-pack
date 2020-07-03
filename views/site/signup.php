<?php
$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
   

    <p class="text-center"><?=__('Please fill out the following fields to signup:');?></p>


            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'cpassword')->passwordInput() ?>

                <?= $form->field($model, 'captcha')->widget(\yii\captcha\Captcha::class) ?>

                <div class="form-group ">
                <?=Html::buttonIcon(__('Daftar'),[
                    'type'=>'submit',
                    'icon'=>Icon::fa('level-up-alt'),
                    'class'=>'btn btn-primary'
                ]);?>
                <?=Html::linkIcon('Kembali',to_route(['/site/login']),[
                    'icon'=>Icon::fa('arrow-circle-left'),
                    'class'=>'btn btn-warning'
                ]);?>
                </div>

            <?php ActiveForm::end(); ?>
       
</div>