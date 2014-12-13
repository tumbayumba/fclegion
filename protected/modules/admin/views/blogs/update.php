<?php
/* @var $this BlogsController */
/* @var $model Blogs */

$this->breadcrumbs=array(
	'Блог'=>array('admin'),
	$model->header,
);

$this->menu=array(
	array('label'=>'Все записи', 'url'=>array('admin')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Удалить слайдер', 'url'=>array('deleteSlider','id'=>$model->id)),
);
?>

<h1<?php echo $model->header; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model_images'=>$model_images)); ?>
