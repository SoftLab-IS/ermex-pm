<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 *
	 * @author Panic Aleksandar
	 */
	public function actionIndex()
	{
		$this->redirect($this->createUrl('/radninalozi/index'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;

		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}


	/**
	 * Displays the System login page
     *
     * @author Aleksandar Panic
     *
	 */
	public function actionSystemlogin()
	{
		$model = new LoginForm;

        $notActive = false;

		if(isset($_POST['ajax']) && $_POST['ajax'] === 'login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect($this->createUrl('/radninalozi/index'));

            $notActive = $model->notActive;
		}

		$this->layout = '//layouts/systemloginlayout';

		$this->render('systemlogin',
        array(
            'model' => $model,
            'notActive' => $notActive,
        ));
	}

	/**
	 * Displays the login page
     *
     * @author Aleksandar Panic
     *
	 */
	public function actionLogin($nid)
	{
		$nid = (int)$nid;

		if ($nid < 0)
		{
			Yii::app()->user->logout();
			$this->redirect(Yii::app()->basePath);
		}
		else
		{
			$model = new LoginForm;

			$user = Users::model()->findByPk($nid);

	        $notActive = false;

			if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}

			// collect user input data
			if(isset($_POST['LoginForm']))
			{
				$model->attributes=$_POST['LoginForm'];
				// validate user input and redirect to the previous page if valid
				if($model->validate() && $model->login())
					$this->redirect(Yii::app()->user->returnUrl);

	            $notActive = $model->notActive;
			}

			$this->render('login',
	        array(
	            'model' => $model,
	            'notActive' => $notActive,
	            'user' => $user,
	        ));
		}
	}

	public function actionUserswitch($id)
	{
		header('Content-Type:application/json; charset=utf-8');
		if (Yii::app()->request->isAjaxRequest)
		{
			$id = (int)$id;

			$user = Users::model()->findByPk($id);

			if ($user)
			{
				if ($user->privilegeLevel > Yii::app()->session['level'])
				{
					echo '{"done":false,"login":true}';
				}
				else
				{
		            Yii::app()->session['id'] = $user->usId;
		            Yii::app()->session['level'] = $user->privilegeLevel;
		            Yii::app()->session['fullname'] = $user->realName + " " + $user->realSurname;
		            echo '{"done":true}';
				}
			}	
		}
		else
			echo '{"done":false}';
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}