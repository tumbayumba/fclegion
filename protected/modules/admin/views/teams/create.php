<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Команды'=>array('admin'),
	'Новая',
);

$this->menu=array(
	//array('label'=>'List Teams', 'url'=>array('index')),
	array('label'=>'Все команды', 'url'=>array('admin')),
);
?>

<h1>Новая команда</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
