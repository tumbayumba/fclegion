<?php
/* @var $this TeamsController */
/* @var $model Teams */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'teams-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Поля с <span class="required">*</span> обязательны.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fullname'); ?>
		<?php echo $form->textField($model,'fullname',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'fullname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'alias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foundation_date'); ?>
		<?php //echo $form->textField($model,'foundation_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'foundation_date',
			'language'=>'ru',
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
			),
			'options'=>array(
				'dateFormat' => 'yy-mm-dd',
				'changeYear' => true,
			),
		));
		?>
		<?php echo $form->error($model,'foundation_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'league_id'); ?>
		<?php echo $form->textField($model,'league_id'); ?>
		<?php echo $form->error($model,'league_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php (isset($model->image))? $image = $model->image : $image = null; ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/teams/'.$image,'',array('height'=>150,'width'=>'100')); ?>
		<?php echo $form->fileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gerb_image'); ?>
		<?php (isset($model->gerb_image))? $gerb_image = $model->gerb_image : $gerb_image = null; ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/gerbs/'.$gerb_image,'',array('height'=>150,'width'=>'100')); ?>
		<?php echo $form->fileField($model,'gerb_image'); ?>
		<?php echo $form->error($model,'gerb_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history'); ?>
		<?php //echo $form->textArea($model,'history',array('rows'=>6, 'cols'=>50)); ?>
		<?php
		$this->widget('ext.ckeditor.CKEditor',array(
		  "model"=>$model,                 # Data-Model
		  "attribute"=>'history',          # Attribute in the Data-Model
		  ));
		?>
		<?php echo $form->error($model,'history'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
