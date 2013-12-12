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
		$this->render('otpremnica');
	}

	public function actionRadninalog($id)
	{
		$this->render('radninalog');
	}
}