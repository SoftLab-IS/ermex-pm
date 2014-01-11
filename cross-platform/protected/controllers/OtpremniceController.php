<?php

class OtpremniceController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
             ),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'reconcile', 'storn'),
				'users'=>array('@'),
             ),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'archive'),
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
			'model'=>$this->loadModel($id),
          ));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{

		$model = new Deliveries;
        $products = new Order("search");

        if(isset($_POST['Deliveries']))
        {

            $oldSerial = Deliveries::model()->lastSerial()->find();
            $model->attributes = $_POST['Deliveries'];
            $model->deliveryDate = time();
            $model->reconciledId = Yii::app()->session['id'];
            $model->authorId = Yii::app()->session['id'];
            $model->deliverySerial = ($oldSerial === null) ? 'OT1-' . date("m/Y") : SerialGenerator::generateSerial($oldSerial->deliverySerial);
            
            if($model->save())
            {
                if(isset($_POST['Order']))
                {
                    $narudzbe = $_POST['Order'];

                    for($i = 0; $i < count($narudzbe); $i++)
                    {
                        if(isset($narudzbe['title'][$i]))
                        {
                            if ($narudzbe['id'][$i] == '0')
                            {
                                $order = new Order();
                                $order->done = 1;
                                $order->woId = NULL;
                            }
                            else
                                $order = Order::model()->findByPk($narudzbe['id'][$i]);

                            $order->title = $narudzbe['title'][$i];
                            $order->amount = str_replace(',', '.', $narudzbe['amount'][$i]);
                            $order->measurementUnit = $narudzbe['measurementUnit'][$i];
                            $order->price = str_replace(',', '.', $narudzbe['price'][$i]);
                            $order->description = $narudzbe['description'][$i];
                            
                            $order->deId = $model->primaryKey;
                            
                            $order->save(); 
                        }
                    }
                }
                $this->redirect(array('view','id' => $model->deId));
            }

        }
        else
        {
            if(isset($_POST['orderId']))
            {
                $orderId = array();
                foreach($_POST['orderId'] as $i)
                {
                    array_push($orderId, $i);
                }

                $orders = Order::model()->findAllByPk($orderId);
            }
            else
            {
                $orders = null;
            }
        }

        $this->render('create',array(
         'model'=> $model,
         'orders' => $orders,
         'products' => $products,
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
        $orders = Order::model()->findAllByAttributes(array('deId' => $id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        if(isset($_POST['Deliveries']))
        {
         $model->attributes=$_POST['Deliveries'];
         $model->deliveryDate = time();
         $model->authorId = Yii::app()->session['id'];
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
                        $order->deId = $model->deId;

                        if($order->orderId === '0')
                        {
                            $order->done = 1;
                            $order->woId = NULL;
                            $order->save();
                        }

                        else
                            $order->update();
                    }
                }
            }
            $this->redirect(array('view','id'=>$model->deId));
        }

    }

    $this->render('update',array(
     'model'=>$model,
     'orders'=>$orders,
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
        if(isset($_POST['deliveryId']))
        {
            $safePks = array();

            foreach($_POST['deliveryId'] as $i)
                $safePks[] = (int)$i;

            if (isset($_POST['stornirajOdabrane']))
            {
                $this->stornItems($safePks);
            }
            else if (isset($_POST['zakljuciOdabrane']))
            {
                $this->reconcileItems($safePks);
            }
            else if (isset($_POST['arhivirajOdabrane']))
            {
                $this->archiveItems($safePks);
            }
        }

        if (Yii::app()->session['level'] < 2)
        {
            $criteria = new CDbCriteria;
            $criteria->condition='reconciled IS NULL AND archived IS NULL';
        }
        else
        {
            $criteria = new CDbCriteria;
            $criteria->condition='archived IS NULL';

        }

        $dataProvider = new CActiveDataProvider(Deliveries::model(), array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 25,
                ),
            ));

        $this->render('index',array(
            'dataProvider'=>$dataProvider,
            'userLevel' => Yii::app()->session['level'],
            ));
    }

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Deliveries('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Deliveries']))
			$model->attributes=$_GET['Deliveries'];

		$this->render('admin',array(
			'model'=>$model,
          ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Deliveries the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Deliveries::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Deliveries $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='deliveries-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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

    public function actionArchive($id)
    {
        $this->archiveItems($id);
        $this->redirect(array('index'));
    }

    /**
     * Makes one or multiple items storned
     *
     * @param $safePks - array of primary keys
     */
    public function stornItems($safePks)
    {
        Deliveries::model()->updateByPk($safePks,
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
        Deliveries::model()->updateByPk($safePks,
            array(
                'reconciled' => '1',
                'delivered' => '1',
                'reconciledId' => Yii::app()->session['id'],
                ));
    }

    public function archiveItems($safePks)
    {
        Deliveries::model()->updateByPk($safePks,
            array(
                'archived' => '1',
                ));
    }
}
