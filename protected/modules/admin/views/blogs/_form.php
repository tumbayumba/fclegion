<?php
/* @var $this BlogsController */
/* @var $model Blogs */
/* @var $form CActiveForm */
?>

<div class="form">
<!--<input type="file" multiple="multiple" name="attachment[file][]" id="files"> -->
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'blogs-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'header'); ?>
		<?php echo $form->textArea($model,'header',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'header'); ?>
	</div>
	
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'images'); ?>
		<p class="note">Вы можете выбрать несколько изображений. При выборе нужно удержывать клавишу 'CTRL'</p>
		<?php //echo $form->fileField($model,'images',array('multiple'=>true)); ?>
		<?php //echo $form->error($model,'images'); ?>
	</div>-->
	<p class="note">Вы можете выбрать несколько изображений для слайдера (рекомендуется 860x400px).</p>
	<?php
	$this->widget('CMultiFileUpload', array(
                'name' => 'images',
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
            ));
    if(!$model->isNewRecord){
		foreach($model_images as $image){
			echo CHtml::image(Yii::app()->request->baseUrl.'/images/blogs/'.$model->id.'/'.$image->image,'',array('height'=>150,'width'=>'100'));
		}
	}
	?>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model' => $model,
			'attribute' => 'create_date',
			'language'=>'ru',
			'htmlOptions' => array(
				'size' => '10',         // textField size
				'maxlength' => '10',    // textField maxlength
			),
			'options'=>array(
				'dateFormat' => 'yy-mm-dd',
				'changeYear' => true,
				'yearRange'=>'2014:2050',
			),
		));
		?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->hiddenField($model,'author_id',array('value'=>Yii::app()->user->id,'type'=>'hidden')); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php
		$this->widget('ext.ckeditor.CKEditor',array(
		  "model"=>$model,                 # Data-Model
		  "attribute"=>'content',          # Attribute in the Data-Model
		  ));
		?>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
