<?php

class ProizvodiController extends Controller
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
                  'actions'=>array('index','otvori', 'vratiproizvode'),
                  'users'=>array('@'),
            ),
            array('deny',  // deny all users
                  'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
        $model = new Order("search");

		$this->render('index',
        array(
          'model' => $model,
        ));
	}

	public function actionOtvori($id)
	{
        $model = WorkAccounts::model()
                 ->with('workers')
                 ->proizvodi()
                 ->findByPk($id);


		$this->render('otvori',
        array(
             'model' => $model,
        ));
	}

    public function actionVratiproizvode()
    {
        $result = array();

        if(Yii::app()->request->isAjaxRequest)
        {
            $safePks = array();

            $orderIds = explode(",", $_POST["searchIds"]);

            foreach($orderIds as $i)
            {
                $safePks[] = (int)$i;
            }

            
            $data = Order::model()->findAllByPk($safePks);

            if ($data != null)
            {
                foreach($data as $d)
                    $result[] = array(
                        "naziv" => $d->title,
                        "kolicina" => $d->amount,
                        "mjera" => $d->measurementUnit,
                        "cijena" => $d->price,
                        "opis" => $d->description,
                        "id" => $d->orderId
                    );
                
            }
        }

        header('Content-Type:application/json; charset=utf-8'); 
        echo CJSON::encode($result);
    }
}