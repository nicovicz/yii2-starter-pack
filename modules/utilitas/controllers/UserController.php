<?php

namespace app\modules\utilitas\controllers;

use Yii;
use hscstudio\mimin\models\User;
use hscstudio\mimin\models\AuthAssignment;
use hscstudio\mimin\models\AuthItem;
use hscstudio\mimin\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
	use \app\helpers\AuthGuardTrait;

	/**
	 * Lists all User models.
	 * @return mixed
	 */
	public function actionIndex()
	{
		$searchModel = new UserSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->getSort()->defaultOrder = ['status'=>SORT_DESC];
		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single User model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id)
	{
		$model = $this->findModel($id);
		$authAssignments = AuthAssignment::find()->where([
			'user_id' => $model->id,
		])->column();

		$authItems = ArrayHelper::map(
			AuthItem::find()->where([
				'type' => 1,
			])->asArray()->all(),
			'name', 'name');

		$authAssignment = new AuthAssignment([
			'user_id' => $model->id,
		]);

		if (Yii::$app->request->post()) {
			$authAssignment->load(Yii::$app->request->post());
			// delete all role
			AuthAssignment::deleteAll(['user_id' => $model->id]);
			if (is_array($authAssignment->item_name)) {
				foreach ($authAssignment->item_name as $item) {
					
						$authAssignment2 = new AuthAssignment([
							'user_id' => $model->id,
						]);
						$authAssignment2->item_name = $item;
						$authAssignment2->created_at = time();
						$authAssignment2->save();

				
					
				}

				$authAssignments = AuthAssignment::find()->where([
					'user_id' => $model->id,
				])->column();
			}
			
			Yii::$app->session->setFlash('success', 'Data tersimpan');
		}
		$authAssignment->item_name = $authAssignments;
		return $this->render('view', [
			'model' => $model,
			'authAssignment' => $authAssignment,
			'authItems' => $authItems,
		]);
	}

	/**
	 * Creates a new User model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate()
	{
		$model = new User();

		if ($model->load(Yii::$app->request->post())) {
			$model->setPassword('123456');
			$model->status = $model->status==1?10:0;
			if ($model->save()) {
				Yii::$app->session->setFlash('success', 'User Berhasil Dibuat Dengan Password 123456');
			} else {
				Yii::$app->session->setFlash('error', 'User Gagal Dibuat');
			}

			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('create', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Updates an existing User model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id)
	{
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->save()) {
			if (!empty($model->new_password)) {
			    $model->setPassword($model->new_password);
			}
			$model->status = $model->status==1?10:0;
			if ($model->save()) {
			    Yii::$app->session->setFlash('success', 'User Berhasil Diupdate');
			} else {
			    Yii::$app->session->setFlash('error', 'User Gagal Diupdate');
			}
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			$model->status = $model->status==10?1:0;
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing User model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id)
	{
		$model = $this->findModel($id);
		$model->status = 0;
		
		if ($model->id == Yii::$app->user->id){
			Yii::$app->session->setFlash('error', 'Tidak Dapat Menghapus Akun Yang Sedang Login');

		}else{
			if ($model->save()){
				Yii::$app->session->setFlash('success', 'Akun Berhasil Dihapus');
			}else{
				Yii::$app->session->setFlash('error', 'Akun Gagal Dihapus');
			}
		
		}
		
		return $this->redirect(['index']);
	}

	/**
	 * Finds the User model based on its primary key value.
	 * If the model is not found, a 404 HTTP exception will be thrown.
	 * @param integer $id
	 * @return User the loaded model
	 * @throws NotFoundHttpException if the model cannot be found
	 */
	protected function findModel($id)
	{
		if (($model = User::findOne($id)) !== null) {
			return $model;
		} else {
			throw new NotFoundHttpException('The requested page does not exist.');
		}
	}
}
