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
                  'actions'=>array('index','otvori'),
                  'users'=>array('@'),
            ),
            array('deny',  // deny all users
                  'users'=>array('*'),
            ),
        );
    }

	public function actionIndex()
	{
        $model = Order::model()->findByAttributes(array('done' => 1));

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
}