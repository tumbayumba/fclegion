<?php
/* @var $this BlogsController */
/* @var $model Blogs */

$this->breadcrumbs=array(
	'Блог',
);

$this->menu=array(
	array('label'=>'Создать', 'url'=>array('create')),
);
?>

<h1>Блог</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'blogs-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
			'name'=>'header',
			'type'=>'raw',
			'value'=>'CHtml::link("$data->header",array("update","id"=>$data->id),array("style"=>"text-decoration:none;"))',
		),
		//'content',
		'create_date',
		//'author_id',
		array(
			'name'=>'author_id',
			'value'=>'BlogsController::getUsername($data->author_id)',
		),
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
