<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Команды'=>array('teams/admin'),
	$team->fullname=>array('teams/view','id'=>$team->id),
	'Игроки'=>array('admin','team_id'=>$team->id),
	'Новый игрок',
);

$this->menu=array(
	array('label'=>'Игроки', 'url'=>array('admin','team_id'=>$team->id)),
	//array('label'=>'Manage Players', 'url'=>array('admin')),
);
?>

<h1>Новый игрок</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'team'=>$team)); ?>
