<?php
/* @var $this TeamsController */
/* @var $model Teams */

$this->breadcrumbs=array(
	'Команды'=>array('admin'),
	$model->fullname,
);

$this->menu=array(
	//array('label'=>'List Teams', 'url'=>array('index')),
	//array('label'=>'Новая команда', 'url'=>array('create')),
	//array('label'=>'Править', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Все команды', 'url'=>array('admin')),
	array('label'=>'Игроки', 'url'=>array('players/admin','team_id'=>$model->id)),
);
?>

<h1><?php echo $model->fullname; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'fullname',
		'alias',
		'foundation_date',
		//'history',
		'league_id',
		//'image',
		//'gerb_image',
		//'description',
	),
)); ?>
