<?php

class BlogsController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array(),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
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
		$model=new Blogs;
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);

		if(isset($_POST['Blogs']))
		{
			$model->attributes=$_POST['Blogs'];
			$images = CUploadedFile::getInstancesByName('images');
			if($model->save()){
				if(!is_dir('images/blogs/'.$model->id)){
				   mkdir('images/blogs/'.$model->id);
				   chmod('images/blogs/'.$model->id, 0777); 
				}
				if (isset($images) && count($images) > 0){
					foreach ($images as $image => $pic){
						if ($pic->saveAs('images/blogs/'.$model->id.'/'.$pic->name)){
							$model_images = new BlogImages;
							$model_images->blog_id = $model->id;
							$model_images->image = $pic->name;
							$model_images->save();
						}
					}
				}
				else{
					$model_images = new BlogImages;
					$model_images->blog_id = $model->id;
					$model_images->image = null;
					$model_images->save();
				}
				$this->redirect(array('admin'));	
			}
			
		}

		$this->render('create',array(
			'model'=>$model,
			//'model_images'=>$model_images,
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
		$model_images = BlogImages::model()->findAll('blog_id=:big',array(':big'=>$id));
		
		// Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
		$images = CUploadedFile::getInstancesByName('images');
		if(isset($_POST['Blogs']))
		{
			$model->attributes=$_POST['Blogs'];
			
			if($model->save()){
				if (isset($images) && count($images) > 0){
					foreach ($images as $image => $pic){
						if ($pic->saveAs('images/blogs/'.$model->id.'/'.$pic->name)){
							$model_images = new BlogImages;
							$model_images->blog_id = $model->id;
							$model_images->image = $pic->name;
							$model_images->save();
						}
					}
				}
				$this->redirect(array('admin'));	
			}
			
		}

		$this->render('update',array(
			'model'=>$model,
			'model_images'=>$model_images,
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
		BlogImages::model()->deleteAll('blog_id=:bid',array(':bid'=>$id));
		$dir = Yii::app()->request->baseUrl.'images/blogs/'.$id.'/';
		$op_dir=opendir($dir);
		while($file=readdir($op_dir)){
			if($file != "." && $file != ".."){
			   unlink($dir.$file);
			}
		}
		closedir($op_dir);
		rmdir($dir);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	public function actionDeleteSlider($id)
	{
		BlogImages::model()->deleteAll('blog_id=:bid',array(':bid'=>$id));
		$dir=Yii::app()->request->baseUrl.'images/blogs/'.$id.'/';
		$op_dir=opendir($dir);
		while($file=readdir($op_dir)){
			if($file != "." && $file != ".."){
			   unlink($dir.$file);
			}
		}
		closedir($op_dir);
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('update','id'=>$id));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Blogs');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Blogs('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Blogs']))
			$model->attributes=$_GET['Blogs'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Blogs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Blogs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Blogs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='blogs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public static function getUsername($user_id){
		$user = Users::model()->findByPk($user_id);
		return $user->login;
	}
}
