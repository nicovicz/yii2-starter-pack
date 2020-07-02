<?php

use app\widgets\Html;
use yii\grid\GridView;
use app\widgets\Card;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manajemen Hak Akses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

<?php Card::begin(['title'=>$this->title,'icon'=>'folder-open']) ?>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'name',
			/*
			'type',
			'description:ntext',
			'rule_name',
			'data:ntext',
			// 'created_at',
			// 'updated_at',
			*/
			[
				'options' => [
					'width' => '80px',
				],
				'class' => 'yii\grid\ActionColumn'
			],
		],
	]); ?>

<?php Card::end();?>

</div>
