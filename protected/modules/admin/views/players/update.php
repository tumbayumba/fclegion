<?php
/* @var $this PlayersController */
/* @var $model Players */

$this->breadcrumbs=array(
	'Команды'=>array('teams/admin'),
	$team->fullname=>array('teams/view','id'=>$team->id),
	'Игроки'=>array('admin','team_id'=>$team->id),
	$model->lastname,
);

$this->menu=array(
	array('label'=>'Игроки', 'url'=>array('admin','team_id'=>$team->id)),
);
?>

<h1><?php echo $model->lastname; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'team'=>$team)); ?>
