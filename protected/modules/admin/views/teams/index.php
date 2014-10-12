<?php
/* @var $this TeamsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Teams',
);

$this->menu=array(
	array('label'=>'Новая команда', 'url'=>array('create')),
	array('label'=>'Все команды', 'url'=>array('admin')),
);
?>

<h1>Команды</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
