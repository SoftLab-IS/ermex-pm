<?php

class KorisniciController extends Controller
{
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',
					'actions' => array('index','view', 'create', 'update', 'delete'),
					'users' => array('@'),
			),
			array('deny',
			'users' => array('*'),
			)
		);
	}

	/**
	 * Checks whether or not user has allowed privileges or redirect is performed.
	 *
	 * @author Aleksandar Panic
	 *
	 */
	public function userCheck()
	{
		if (Yii::app()->session['level'] != 3)
			$this->redirect(Yii::app()->baseUrl);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->userCheck();

		$this->render('view',
		array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Users('register');
		$this->performAjaxValidation($model);

		$this->userCheck();

		if(isset($_POST['Users']))
		{
			$model->attributes = $_POST['Users'];

			$model->registerDate = time();
			$model->password = md5(strtolower($model->password));
			$model->verifyPassword = md5(strtolower($model->verifyPassword));

			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',
		array(
			'model' => $model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model = $this->loadModel($id);

		$this->performAjaxValidation($model);

		$this->userCheck();

		if(isset($_POST['Users']))
		{
			$password = $model->password;

			$model->attributes = $_POST['Users'];

			if ($model->password == "")
				$model->password = $password;
			else
			{
				$model->password = md5(strtolower($model->password));
				$model->verifyPassword = md5(strtolower($model->verifyPassword));
			}

			if($model->save())
                $this->redirect(array('index'));
		}

		$this->render('update',
		array(
			'model' => $model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->userCheck();

		$this->loadModel($id)->delete();

		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->userCheck();

		$dataProvider = new CActiveDataProvider('Users',
		array(
			'pagination' => array(
                'pageSize' => 25,
            ),
		));

		$this->render('index',array(
			'dataProvider' => $dataProvider,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
