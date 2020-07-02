<?php
use app\widgets\Card;
use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;

/* @var $this yii\web\View */
/* @var $model app\modules\administrator\models\User */

$this->title = 'Detil Akun: '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Manajemen Akun', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

<?php Card::begin([
    'icon'=>'exclamation-circle',
    'title'=>'Detil User'
]);?>


<?=$this->render('@app/widgets/view-button',[
    'id'=>$model->id,
    'confirm'=>'Apakah Anda Yakin Akan Menghapus Akun Ini?'
]);?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          
            'username',
          
            'email:email',
            'status',
            ['attribute'=>'created_at','format'=>'datetime','label'=>'Dibuat Pada'],
            ['attribute'=>'updated_at','format'=>'datetime', 'label'=>'Diubah Pada'],
        ],
    ]) ?>
    <hr/>
    <?php $form = ActiveForm::begin([]); ?>
    <?php
    echo $form->field($authAssignment, 'item_name')->widget(Select2::classname(), [
      'data' => $authItems,
      'options' => [
        'placeholder' => 'Pilih Hak Akses',
      ],
      'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true,
      ],
    ])->label('Role'); ?>

    <div class="form-group">
        <?=$this->render('@app/widgets/save-button');?>
    </div>
    <?php ActiveForm::end(); ?>

    <?php Card::end();?>
</div>
