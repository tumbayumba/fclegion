<?php
/* @var $this NewsController */
/* @var $model News */

$this->breadcrumbs=array(
	'Новости',
);

$this->menu=array(
	array('label'=>'Новая новость :)', 'url'=>array('create')),
);
?>

<h1>Новости</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		'header',
		//'content',
		'create_date',
		//'author_id',
		array(
			'name'=>'author_id',
			'value'=>'NewsController::getUsername($data->author_id)',
		),
		'source',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
		),
	),
)); ?>
