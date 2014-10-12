<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Команды'=>array('teams/admin'),
	$team->fullname=>array('teams/view','id'=>$team->id),
	'Игроки',
);

$this->menu=array(
	array('label'=>$team->fullname, 'url'=>array('teams/view','id'=>$team->id)),
	array('label'=>'Новый игрок', 'url'=>array('create','team_id'=>$team->id)),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#players-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Игроки "<?php echo $team->fullname;?>"</h1>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'players-grid',
	'dataProvider'=>$model->curTeamSearch($team->id),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'firstname',
		//'lastname',
		array(
			'name'=>'firstname',
			'header'=>'ФИО',
			'value'=>'$data->lastname." ".$data->firstname',
		),
		//'team_id',
		'alias',
		'birthday',
		/*
		'image',
		'biography',
		'description',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
