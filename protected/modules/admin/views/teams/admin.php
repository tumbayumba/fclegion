<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	//'Teams'=>array('index'),
	'Править',
);

$this->menu=array(
	//array('label'=>'List Teams', 'url'=>array('index')),
	array('label'=>'Новая команда', 'url'=>array('create')),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#teams-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Команды</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'teams-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'fullname',
		array(
			'name'=>'fullname',
			'type'=>'raw',
			'value'=>'CHtml::link("$data->fullname",array("view","id"=>$data->id))',
		),
		'alias',
		//'foundation_date',
		array(
			'name'=>'foundation_date',
			'value'=>'TeamsController::getYear($data->foundation_date)',
		),
		//'history',
		'league_id',
		/*
		'image',
		'gerb_image',
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}{delete}',
		),
	),
)); ?>
