<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости'=>array('admin'),
	'Редактировать',
);

$this->menu=array(
	array('label'=>'Все новости', 'url'=>array('admin')),
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1><?php echo $model->header; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
