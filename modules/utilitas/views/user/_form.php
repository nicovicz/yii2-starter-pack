<?php

use app\widgets\Icon;
use app\widgets\ActiveForm;
use kartik\widgets\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

	<?php if ($model->isNewRecord) { ?>
		<div class="alert alert-info">
		<?=Icon::fa('exclamation-circle');?></i> Default Password : 123456
		</div>
	<?php } ?>
	<?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	
	<?= $form->field($model, 'status')->widget(SwitchInput::classname(), [
		'pluginOptions' => [
			'onText' => 'Active',
			'offText' => 'Banned',
		]
	]) ?>

	<?php if (!$model->isNewRecord) { ?>
		<fieldset> 
			<legend class="text-danger"> <h6><?=Icon::fa('exclamation-circle');?> Abaikan Jika Tidak Ingin Mengubah Password</h6></legend>
		<div class="ui divider"></div>
		<?= $form->field($model, 'new_password') ?>
		<?= $form->field($model, 'repeat_password') ?>
		<?= $form->field($model, 'old_password') ?>
		</fieldset>
	<?php } ?>
	

	<?php ActiveForm::end(); ?>

</div>
