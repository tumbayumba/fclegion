<?php
/* @var $this BlogsController */
/* @var $model Blogs */

$this->breadcrumbs=array(
	'Блог'=>array('admin'),
	'Создать',
);

$this->menu=array(
	array('label'=>'Все записи', 'url'=>array('admin')),
);
?>

<h1>Создать</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
