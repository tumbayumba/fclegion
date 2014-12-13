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
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$news = News::model()->findAll(array('order'=>'create_date DESC','limit'=>5));
		$blogs = Blogs::model()->findAll(array('order'=>'create_date DESC','limit'=>3));
		$blog = Blogs::model()->find(array('order'=>'create_date DESC','limit'=>1));
		$images = SiteController::getImages($blog->id);
		$author = Users::model()->findByPk($blog->author_id);
		$this->render('index',array(
			'news'=>$news,
			'blog'=>$blog,
			'blogs'=>$blogs,
			'author'=>$author,
			'images'=>$images,
		));
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
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
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
			//if($model->validate() && $users->login($model->username,$model->password))
			if($model->validate() && $model->login($model->username,$model->password))
				$this->redirect(Yii::app()->user->returnUrl);
				//$this->redirect(array('index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionRegister(){
		$model = new Users;
		
		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->password = md5($model->password);
			$model->password2 = md5($model->password2);
			if($model->save())
				$this->redirect(array('regok','id'=>$model->id));
		}
		$this->render('register',array('model'=>$model));
	}
	
	public function actionRegok($id){
		$model = Users::model()->findByPk($id);
		
		$this->render('regok',array('model'=>$model));
	}
	
	public static function getImages($blog_id){
		$images = BlogImages::model()->findAll('blog_id=:bid',array(':bid'=>$blog_id));
		if(empty($images)){
			return false;
		}
		else{
			return $images;
		}
		
	}
	
}
