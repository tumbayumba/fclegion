<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
?>

<div class="main">
	<div class="container">
		<div class="col-md-9 col-sm-9">
			<h1>Login</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-7 col-sm-7">
					<p><?php echo Yii::t('user','Please fill out the following form with your login credentials:')?></p>
						<?php $form=$this->beginWidget('CActiveForm', array(
							'id'=>'login-form',
							'enableClientValidation'=>true,
							'clientOptions'=>array(
								'validateOnSubmit'=>true,
							),
						)); ?>
                  <!--<form class="form-horizontal form-without-legend" role="form">-->
					<p class="note"><?php echo Yii::t('user','Fields with <span class="required">*</span> are required.')?></p>
                    <div class="form-group">
                      <!--<label for="email" class="col-lg-4 control-label">Login <span class="require">*</span></label>-->
                      <?php echo $form->labelEx($model,'username',array('class'=>'col-lg-4 control-label')); ?>
                      <div class="col-lg-8">
                        <!--<input type="text" class="form-control" id="email">-->
                        <?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
                      </div>
                      <?php echo $form->error($model,'username'); ?>
                    </div>
                    <div class="form-group">
                      <!--<label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>-->
                      <?php echo $form->labelEx($model,'password',array('class'=>'col-lg-4 control-label')); ?>
                      <div class="col-lg-8">
                        <!--<input type="text" class="form-control" id="password">-->
                        <?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                      </div>
                      <?php echo $form->error($model,'password'); ?>
                    </div>
                    <!--<div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0">
                        <a href="page-forgotton-password.html">Forget Password?</a>
                      </div>
                    </div>-->
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                        <!--<button type="submit" class="btn btn-primary">Login</button>-->
                        <?php echo CHtml::submitButton(Yii::t('user','Login'),array('class'=>'btn btn-primary')); ?>
                      </div>
                    </div>
                    
                  <!--</form>-->
                  <?php $this->endWidget(); ?>
                </div>
                
              </div>
            </div>
        </div>

	</div>
</div>
