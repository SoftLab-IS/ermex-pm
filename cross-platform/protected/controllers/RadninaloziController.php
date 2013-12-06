<?php

class RadninaloziController extends Controller
{
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
				'actions'=>array('index','view','getmaterial'),
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
		$materials = UsedMaterials::model();
        $radnici = Users::model()->findAll();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkAccounts']))
		{
			$model->attributes = $_POST['WorkAccounts'];
            $datum = explode('.', $model->deadlineDate);
            $oldSerial = WorkAccounts::model()->lastSerial()->find();
            $model->workAccountSerial = ($oldSerial === null)? 'RN1-'.date("m/Y") : SerialGenerator::generateSerial($oldSerial->workAccountSerial);
            $model->creationDate = time();
            $model->deadlineDate = mktime(0, 0, 0, (int)$datum[1], (int)$datum[0], (int)$datum[2]);
            $model->authorId = Yii::app()->session['id'];
            if(isset($_POST['user']))
            {
                $trenutniKorisnici = $_POST['user'];
                foreach($trenutniKorisnici as $trenutniKorisnik)
                {
                    $model->usersList = $trenutniKorisnik.',';
                }
            }
            $trenutniKorisnici = explode(',',$model->usersList);
            $model->currentUser = (int)$trenutniKorisnici[0];
			if($model->save())
            {
                if(isset($_POST['Order']))
                {
                    $narudzbe = $_POST['Order'];
                    for($i=0;$i<count($narudzbe);$i+=5)
                    {
                        $order = new Order();
                        $order->title = $narudzbe[$i]['title'];
                        $order->amount = $narudzbe[$i+1]['amount'];
                        $order->measurementUnit = $narudzbe[$i+2]['measurementUnit'];
                        $order->price = $narudzbe[$i+3]['price'];
                        $order->description = $narudzbe[$i+4]['description'];
                        $order->woId = $model->woId;
                        $order->deId =NULL;

                        if(!$order->save());


                    }
                }
            }
		    $this->redirect(array('view','id'=>$model->woId));
		}


		$this->render('create',array(
			'model' => $model,
			'materials' => $materials,
            'radnici' => $radnici,
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

//        if (Yii::app()->session['level'] < 2)
//			$data = new CActiveDataProvider(WorkAccounts::model()->forUser(Yii::app()->session['id']));
//		else
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
	/**
	 * Returns JSON object of founded material searched by name
	 */
	public function actionGetmaterial($name)
	{
			
		//echo "This is just a test! Search term: ".$_POST['searchTerm'];
		//echo "This is just a test! Search term: ".$name;
		
		
		if(Yii::app()->request->isAjaxRequest)
		{
			$material = Materials::model()->nameSearch($name);
			
			$materialArray = array();
			
			header('Content-Type:application/json; charset=utf-8');
			
			if ($material != NULL)
			{
				foreach ($material as $m) 
				{
					$materialArray[] = array(
						'name' => $m->name,
						'amount'=> $m->amount,
						'id' => $m->maId,
					);
				}
				
				
				echo CJSON::encode(array(
					"count" => count($materialArray),
					"array" => $materialArray,
				));	
			}
			else 
			{
				echo CJSON::encode(array(
					"count" => 0,
					"array" => array(),
				));
			}
		}
		
	}
	
}
