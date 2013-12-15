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
				'actions'=>array('create','update', 'storn', 'reconcile', 'nextWorker'),
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
		$model = WorkAccounts::model()->findByPk($id);
		$usersList = $this->showWorkers($model->usersList);
		$usedMaterials = UsedMaterials::model()->findAllByAttributes(array('workAccountId' => $id));
		$this->render('view',array(
			'model'=>  $model,
			'usersList' => $usersList,
			'usedMaterials' => $usedMaterials,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new WorkAccounts;
		$materials = Materials::model();
        $usedMaterials = UsedMaterials::model();
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
                    $model->usersList .= $trenutniKorisnik.',';
                }
                $model->usersList = rtrim($model->usersList,',');
                $trenutniKorisnici = explode(',',$model->usersList);
                $model->currentUser = (int)$trenutniKorisnici[0];
            }
			if($model->save())
            {
                if(isset($_POST['Order']))
                {
                    $narudzbe = $_POST['Order'];
                    for($i=0;$i<count($narudzbe);$i+=5)
                    {
                        if(isset($narudzbe[$i]['title']))
                        {
                            //TODO wrap in transaction
                            $order = new Order();
                            $order->title = $narudzbe[$i]['title'];
                            $order->amount = str_replace(',','.',$narudzbe[$i+1]['amount']);
                            $order->measurementUnit = $narudzbe[$i+2]['measurementUnit'];
                            $order->price = str_replace(',','.',$narudzbe[$i+3]['price']);
                            $order->description = $narudzbe[$i+4]['description'];
                            $order->woId = $model->woId;
                            $order->deId =NULL;

                            if(!$order->save());
                        }
                    }
                }
                if(isset($_POST['Materials']))
                {
                    $materijali = $_POST['Materials'];
                    for($i=0;$i<count($materijali);$i+=2)
                    {
                        $material = new UsedMaterials();
                        $material->materialId = $materijali[$i]['maId'];
                        $material->amount = str_replace(',','.',$materijali[$i+1]['amount']);
                        $material->workAccountId = $model->woId;

                        if(!$material->save())
							echo "nije dobro!";
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
        $materials = Materials::model();
        $radnici = Users::model()->findAll();
        $orders = Order::model()->findAllByAttributes(array('woId' => $id));
        $usedMaterials = UsedMaterials::model()->findAllByAttributes(array('workAccountId' => $id));

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['WorkAccounts']))
		{
            $model->usersList = null;
			$model->attributes=$_POST['WorkAccounts'];
            $datum = explode('.', $model->deadlineDate);

            $model->creationDate = time();
            $model->deadlineDate = mktime(0, 0, 0, (int)$datum[1], (int)$datum[0], (int)$datum[2]);
            $model->authorId = Yii::app()->session['id'];

            if(isset($_POST['user']))
            {
                $trenutniKorisnici = $_POST['user'];
                foreach($trenutniKorisnici as $trenutniKorisnik)
                {
                    $model->usersList .= $trenutniKorisnik.',';
                }
                $model->usersList = rtrim($model->usersList,',');
            }

			if($model->save())
            {
                if(isset($_POST['Order']))
                {
                    $narudzbe = $_POST['Order'];
                    for($i=0;$i<count($narudzbe);$i+=6)
                    {
                        if(isset($narudzbe[$i]['title']))
                        {
                            if($narudzbe[$i+5]['id'] === '0')
                                $order = new Order();
                            else
                                $order = Order::model()->findByPk($narudzbe[$i+5]['id']);

                            $order->title = $narudzbe[$i]['title'];
                            $order->amount = str_replace(',','.',$narudzbe[$i+1]['amount']);
                            $order->measurementUnit = $narudzbe[$i+2]['measurementUnit'];
                            $order->price = str_replace(',','.',$narudzbe[$i+3]['price']);
                            $order->description = $narudzbe[$i+4]['description'];
                            $order->orderId = $narudzbe[$i+5]['id'];
                            $order->woId = $model->woId;

                            if($order->orderId === '0')
                            {
                                $order->done = 1;
                                $order->deId = NULL;
                                $order->save();
                            }

                            else
                                $order->update();
                        }
                    }
                }
                if(isset($_POST['Materials']))
                {
                    $materijali = $_POST['Materials'];
                    for($i=0;$i<count($materijali);$i+=2)
                    {
                        $usedMaterial = UsedMaterials::model()->findByAttributes(array('materialId' => $materijali[$i]['maId'], 'workAccountId' => $model->woId));
                        if($usedMaterial)
                        {
                            UsedMaterials::model()->deleteALL('materialId = :materialId AND workAccountId = :workAccountId',array('materialId' => $materijali[$i]['maId'], 'workAccountId' => $model->woId));
                        }
                        $material = new UsedMaterials();
                        $material->materialId = $materijali[$i]['maId'];
                        $material->amount = str_replace(',','.',$materijali[$i+1]['amount']);
                        $material->workAccountId = $model->woId;

                        if(!$material->save())
                           print_r($material);

                    }
                }
                $this->redirect(array('view','id'=>$model->woId));
            }

		}

		$this->render('update',array(
			'model'=>$model,
            'materials'=>$materials,
            'radnici'=>$radnici,
            'orders'=>$orders,
            'usedMaterials'=>$usedMaterials,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
        WorkAccounts::stornItems($id);
		//$this->loadModel($id)->delete();

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
            {
                $safePks[] = (int)$i;
            }
            if (isset($_POST['stornirajOdabrane']))
            {
                $this->stornItems($safePks);
            }
            else if (isset($_POST['zakljuciOdabrane']))
            {
                $this->reconcileItems($safePks);
            }
            else if (isset($_POST['zavrsiOdabrane']))
            {
                passToNextWorker($safePks);
            }
        }

        $users = Users::model()->findAll();

        $model = new WorkAccounts('search');
        $model->unsetAttributes();

        if(isset($_GET['WorkAccounts']))
        {
            $model->attributes= $_GET['WorkAccounts'];

            if ($model->authorId == 0)
            	$model->authorId = null;

            if ($model->reconciledId == 0)
            	$model->reconciledId = null;

            if (is_string($model->deadlineDate) && $model->deadlineDate != "")
            	$model->deadlineDate = DateTimeHelper::dateToUnix($model->deadlineDate);
        }


        if (Yii::app()->session['level'] < 2)
			$model->forUser(Yii::app()->session['id']);

		$this->render('index',array(
			'model'=> $model,
			'users' => $users,
            'userLevel' => Yii::app()->session['level'],
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

	//Shows workets related to work account
	public function showWorkers($list)
	{
		$indexes = explode(",", $list);
        $users = array();
        foreach($indexes as $index)
        {
            array_push($users, Users::model()->findByPk($index));
        }
		return $users;
	}

    public function actionStorn($id)
    {
        $this->stornItems($id);
        $this->redirect(array('view','id'=>$id));
    }

    public function actionReconcile($id)
    {
        $this->reconcileItems($id);
        $this->redirect(array('view','id'=>$id));
    }


    public function actionNextWorker($id)
    {
        $this->passToNextWorker(array($id));
        $this->redirect(array('view','id'=>$id));
    }

    public function passToNextWorker($safePks)
    {

        foreach($safePks as $safePk)
        {
            $model = WorkAccounts::model()->findByPk($safePk);
            $nextWorker = $model->getNextWorker();

            if($nextWorker)
            {
                $model->currentUser = $nextWorker;
                $model->update();
            }
            else
            {
                //TODO ako zadnji radnik proslijedi dalje nalog onda treba da ga zakljuci umjesto toga
            }
        }
    }

    /**
     * Makes one or multiple items storned
     *
     * @param $safePks - array of primary keys
     */
    public function stornItems($safePks)
    {
        WorkAccounts::model()->updateByPk($safePks,
            array(
                'invalid' => '1'
            ));
    }

    /**
     * Makes one or multiple items reconciled
     *
     * @param $safePks - array of primary keys
     */
    public function reconcileItems($safePks)
    {
        WorkAccounts::model()->updateByPk($safePks,
            array(
                'reconciled' => '1',
                'reconciledId' => Yii::app()->session['id'],
            ));
    }
}
