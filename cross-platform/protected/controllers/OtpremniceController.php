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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update', 'reconcile', 'storn', 'archive', 'archived'),
				'users'=>array('@'),
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
		$this->render('view',
        array(
			'model' => $this->loadModel($id),
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
            $model->reconciled = 0;
            $model->invalid = 0;
            $model->archived = 0;

            $t = Yii::app()->db->beginTransaction();

            try
            {
                if($model->save())
                {
                    if(isset($_POST['Order']))
                    {
                        $narudzbe = $_POST['Order'];
                        $max = count($narudzbe['title']);
                        for($i = 0; $i < $max; $i++)
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
                                
                                if (!$order->save())
                                    throw new CDbException('Greška pri snimanju narudžbe.');
                            }
                        }
                    }

                }
                else
                    throw new CDbException('Greška pri snimanju otpremnice.');

                $t->commit();

                $this->redirect(array('view','id' => $model->deId));

            }
            catch(Exception $e)
            {
                $t->rollback();
                throw $e;
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

        $this->render('create',
        array(
           'model' => $model,
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
		$model = $this->loadModel($id);
        $orders = Order::model()->findAllByAttributes(array('deId' => $id));
        $products = new Order("search");

        if(isset($_POST['Deliveries']))
        {
           $model->attributes = $_POST['Deliveries'];
           $model->deliveryDate = time();
           $model->authorId = Yii::app()->session['id'];

           $t = Yii::app()->db->beginTransaction();

           try
           {

               if($model->save())
               {
                    if(isset($_POST['Order']))
                    {
                        $narudzbe = $_POST['Order'];
                        $max = count($narudzbe['title']);

                        for($i = 0; $i < $max; $i++)
                        {
                            if(isset($narudzbe['title'][$i]))
                            {
                                if($narudzbe['id'][$i] === '0')
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
                                $order->deId = $model->deId;

                                if (!$order->save())
                                    throw new CDbException('Greška pri snimanju narudžbe.');
                            }
                        }
                    }

                }
                else
                    throw new CDbException('Greška pri snimanju otpremnice.');

                $t->commit();

                $this->redirect(array('view','id' => $model->deId));

            }
            catch(Exception $e)
            {
                $t->rollback();
                throw $e;
            }

    }

    $this->render('update',
        array(
           'model' => $model,
           'orders' => $orders,
           'products' => $products,
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

        $model = new Deliveries('search');
        $model->unsetAttributes();

        if(isset($_GET['Deliveries']))
        {
            $model->attributes = $_GET['Deliveries'];


            if ($model->authorId == 0)
                $model->authorId = null;

            if ($model->reconciledId == 0)
                $model->reconciledId = null;
        }

        $this->render('index',array(
            'users' => Users::model()->findAll(),
            'model' => $model,
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
    public function reconcileItems($pk)
    {
        if (is_array($pk))
        {
            Deliveries::model()->updateByPk($pk,
                array(
                    'reconciled' => '1',
                    'reconciledId' => Yii::app()->session['id'],
                    ));

            Order::model()->updateAll(
                array(
                    'delivered' => '1'
                    ), 'deId IN (' . implode(",", $pk) . ')');
        }
        else if (is_string($pk))
        {
            $pk = (int)$pk;
            Deliveries::model()->updateByPk($pk,
                array(
                    'reconciled' => '1',
                    'reconciledId' => Yii::app()->session['id'],
                    ));

            Order::model()->updateAll(
                array(
                    'delivered' => '1'
                    ), 'deId = ' . $pk);
        }

    }

    public function archiveItems($safePks)
    {
        Deliveries::model()->updateByPk($safePks,
            array(
                'archived' => '1',
                ));
    }

    public function actionArchived()
    {
        $model = new Deliveries('search');
        $criteria = new CDbCriteria();
        $criteria->compare('archived' , 1);
        $criteria->order = 'deID DESC';
        $deliveries = new CActiveDataProvider($model, array('criteria' => $criteria,));
        $this->render('archived',array(
            'model'=> $model,
            'deliveries' => $deliveries,
            'userLevel' => Yii::app()->session['level'],
            'users' => Users::model()->findAll(),
        ));
    }
}
