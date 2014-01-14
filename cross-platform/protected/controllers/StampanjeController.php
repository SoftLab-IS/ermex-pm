<?php

class StampanjeController extends Controller
{

	public $layout = '//layouts/print';

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
			array('allow',
				'actions' => array('index', 'otpremnica', 'radninalog'),
				'users' => array('@'),
			),
			array('deny', 
				'users' => array('*'),
			),
		);
	}

	public function actionIndex()
	{
		$this->redirect(Yii::app()->baseUrl);
	}

	public function actionOtpremnica($id)
	{
        $cijena = 0;
        if(isset($_GET['cijena']))
        {
            if($_GET['cijena'] == 1)
                $cijena = 1;
        }
        $model=Deliveries::model()->findByPk($id);
        $this->render('otpremnica',
            array(
                'model' => $model,
                'saCijenom' => $cijena,
            ));
	}

	public function actionRadninalog($id)
	{
        $model = WorkAccounts::model()->findByPk($id);
        $usersList = $this->showWorkers($model->usersList);
        $usedMaterials = UsedMaterials::model()->findAllByAttributes(array('workAccountId' => $id));
		$this->render('radninalog',
        array(
            'model' => $model,
            'workers' => $usersList,
            'materials' => $usedMaterials,
        ));
	}

	public function actionViseotpremnica()
	{
		$this->render('otpremnica');
	}

	public function actionViseradnihnaloga()
	{
		$this->render('radninalog');
	}

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
}