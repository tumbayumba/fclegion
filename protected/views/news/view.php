<?php
/* @var $this NewsController */
/* @var $model News */
$this->pageTitle=$model->header;
Yii::app()->clientScript->registerMetaTag($model->header, 'description');
Yii::app()->clientScript->registerMetaTag('легион', 'keywords');
?>
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><?php echo CHtml::link('Главная',array('/site/index'));?></li>
            <li><?php echo CHtml::link('Новости',array('/news/index'));?></li>
            <li class="active"><?php echo $model->header;?></li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h1><?php echo $model->header;?></h1><hr>
            <div class="content-page">
                 
                 <div class="col-md-9 col-sm-9">
					 <?php
					 $author = Users::model()->findByPk($model->author_id);
					 echo '<div class="row">
									<ul class="blog-info">
									  <li><i class="fa fa-calendar"></i> '.$model->create_date.'</li>
									  <li><i class="fa fa-user"></i> '.$author->login.'</li>';
									  if($model->source!='')
										echo '<li><i class="fa fa-link"></i>'.CHtml::link($model->source,array(),array('target'=>'_blank')).'</li>';
									echo '</ul>
									<p>'.$model->content.'</p>
					</div><hr>';
					 ?>
				 </div>
				 
				 <div class="row">
						<!-- BEGIN RIGHT SIDEBAR -->      
						<div class="col-md-3 col-sm-3 blog-sidebar">
							  <!-- BEGIN RECENT NEWS -->                            
							  <h2>Последние новости</h2>
							  <div class="recent-news margin-bottom-10">
								
								<div class="row margin-bottom-10">
								  <?php
								  $news = News::model()->findAll(array('order'=>'create_date DESC','limit'=>5));
								  foreach($news as $n){
									  $author = Users::model()->findByPk($n->author_id);
									  echo '<div class="col-md-3">'
										.CHtml::image(Yii::app()->request->baseUrl.'/images/avatars/'.$author->avatar,'',array('class'=>'img-responsive')).                        
									  '</div>
									  <div class="col-md-9 recent-news-inner">
										<h3>'.CHtml::link($n->header,array('news/view','id'=>$n->id),array()).'</h3>
										<p><i class="fa fa-calendar"></i> '.$n->create_date.' <i class="fa fa-user"></i> '.$author->login.'</p>
									  </div>';
								  }
								  ?>
								</div>
								
							  </div>
							  <!-- END RECENT NEWS --> 		
						</div>
						<!-- END RIGHT SIDEBAR --> 
				  </div> 
                 
            </div>
          </div>
          
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
</div>
