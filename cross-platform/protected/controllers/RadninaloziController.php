<?php

class RadninaloziController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=> WorkAccounts::model()->with(array('author','reconciled0'))->findByPk($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new WorkAccounts;
		$workers = Users::model()->onlyWorkers()->findAll();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkAccounts']))
		{
			$model->attributes=$_POST['WorkAccounts'];
            $model->workAccountSerial = SerialGenerator::generateSerial(WorkAccounts::model()->lastSerial()->find()->workAccountSerial);
			if($model->save())
				$this->redirect(array('view','id'=>$model->woId));
		}

		$this->render('create',array(
			'model'=>$model,
			'workers'=>$workers,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkAccounts']))
		{
			$model->attributes=$_POST['WorkAccounts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->woId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        if(isset($_POST['workAccountId']))
        {
            $safePks = array();

            foreach($_POST['workAccountId'] as $i)
                $safePks[] = (int)$i;

            if (isset($_POST['stornirajOdabrane']))
                WorkAccounts::model()->updateByPk($safePks,
                    array(
                         'invalid' => '1'
                    ));
            else if (isset($_POST['zakljuciOdabrane']))
                WorkAccounts::model()->updateByPk($safePks,
                    array(
                         'reconciled' => '1'
                    ));
            
        }

        if (Yii::app()->session['level'] < 2)
			$data = new CActiveDataProvider(WorkAccounts::model()->forUser(Yii::app()->session['id']));
		else
			$data = new CActiveDataProvider(WorkAccounts::model()->forAllUsers());			

		$this->render('index',array(
			'dataProvider'=> $data,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new WorkAccounts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['WorkAccounts']))
			$model->attributes=$_GET['WorkAccounts'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return WorkAccounts the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=WorkAccounts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param WorkAccounts $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='work-accounts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
