<?php

class PlayersController extends Controller
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
	public function actionCreate($team_id)
	{
		$model=new Players;
		$team = Teams::model()->findByPk($team_id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Players']))
		{
			$model->attributes=$_POST['Players'];
			$model->image=CUploadedFile::getInstance($model,'image');
			$model->team_id = $team_id;
			if($model->save()){
				if($model->image!='' && $model->image!=null)
					$model->image->saveAs('images/players/'.$model->image);
				$this->redirect(array('admin','team_id'=>$team_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'team'=>$team,
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
		$team = Teams::model()->findByPk($model->team_id);
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Players']))
		{
			$old_model = Players::model()->findByPk($id);
			$model->attributes=$_POST['Players'];
			if(CUploadedFile::getInstance($model,'image')!='' && CUploadedFile::getInstance($model,'image')!=null){
				$model->image=CUploadedFile::getInstance($model,'image');
			}else{$model->image = $old_model->image;}
			if($model->save()){
				if(CUploadedFile::getInstance($model,'image')!='' && CUploadedFile::getInstance($model,'image')!=null)
					$model->image->saveAs('images/players/'.$model->image);
				$this->redirect(array('admin','team_id'=>$model->team_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'team'=>$team,
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
		$dataProvider=new CActiveDataProvider('Players');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin($team_id)
	{
		$model=new Players('search');
		$team = Teams::model()->findByPk($team_id);
		$players = Players::model()->findAll(array('condition'=>'team_id=:tid','params'=>array('tid'=>$team_id)));
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Players']))
			$model->attributes=$_GET['Players'];

		$this->render('admin',array(
			'model'=>$model,
			'team'=>$team,
			'players'=>$players,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Players the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Players::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Players $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='players-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
