<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Команды'=>array('admin'),
	$model->fullname=>array('view','id'=>$model->id),
	'Править',
);

$this->menu=array(
	//array('label'=>'List Teams', 'url'=>array('index')),
	array('label'=>'Новая команда', 'url'=>array('create')),
	array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Все команды', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->fullname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
