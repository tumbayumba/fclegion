<?php

class TeamsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';
	public $defaultAction = 'admin';

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
			/*array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),*/
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','create','update','delete','index','view'),
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
		$model=new Teams;

		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Teams']))
		{
			$model->attributes=$_POST['Teams'];
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->gerb_image=CUploadedFile::getInstance($model,'gerb_image');
			if($model->save()){
				if($model->image!='' && $model->image!=null)
					$model->image->saveAs('images/teams/'.$model->image);
				if($model->gerb_image!='' && $model->gerb_image!=null)
					$model->gerb_image->saveAs('images/gerbs/'.$model->gerb_image);
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Teams']))
		{
			$old_model = Teams::model()->findByPk($id);
			$model->attributes=$_POST['Teams'];
			if(CUploadedFile::getInstance($model,'image')!='' && CUploadedFile::getInstance($model,'image')!=null){
				$model->image=CUploadedFile::getInstance($model,'image');
			}else{$model->image = $old_model->image;}
			if(CUploadedFile::getInstance($model,'gerb_image')!='' && CUploadedFile::getInstance($model,'gerb_image')!=null){
				$model->gerb_image=CUploadedFile::getInstance($model,'gerb_image');
			}else{$model->gerb_image = $old_model->gerb_image;}
			if($model->save()){
				if(CUploadedFile::getInstance($model,'image')!='' && CUploadedFile::getInstance($model,'image')!=null)
					$model->image->saveAs('images/teams/'.$model->image);
				if(CUploadedFile::getInstance($model,'gerb_image')!='' && CUploadedFile::getInstance($model,'gerb_image')!=null)
					$model->gerb_image->saveAs('images/gerbs/'.$model->gerb_image);
				$this->redirect(array('admin'));
			}
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
		$dataProvider=new CActiveDataProvider('Teams');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Teams('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Teams']))
			$model->attributes=$_GET['Teams'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Teams the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Teams::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Teams $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='teams-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public static function getYear($date){
		$date_arr = explode(' ',$date);
		$date = explode('-',$date_arr[0]);
		($date[0]==0000)? $year = '' : $year = $date[0];
		return $year;
	}
}
