<?php
/* @var $this NewsController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='ФК Легион | новости';
Yii::app()->clientScript->registerMetaTag('ФК Легион новости', 'description');
Yii::app()->clientScript->registerMetaTag('легион, новости', 'keywords');
?>
<div class="main">
	<div class="container">
        
        <ul class="breadcrumb">
            <li><?php echo CHtml::link('Главная',array('/site/index'));?></li>
            <li class="active">Новости</li>
        </ul>
          
            <h1>ФК Легион | новости</h1><hr>
            <div class="content-page">
				<div class="col-md-12 col-sm-12 blog-posts">
                <div class="row">
					
					<div class="col-md-9 col-sm-9 blog-posts">
						<div class="row">
							<?php
							foreach($news as $n){
								$author = Users::model()->findByPk($n->author_id);
								$content = $n->content;
								$content = substr($content,0,200).'...';
								echo '<div class="row">
									<h2>'.CHtml::link($n->header,array('news/view','id'=>$n->id),array('style'=>'text-decoration:none;')).'</h2>
									<ul class="blog-info">
									  <li><i class="fa fa-calendar"></i> '.$n->create_date.'</li>
									  <li><i class="fa fa-user"></i> '.$author->login.'</li>
									  <!--<li><i class="fa fa-tags"></i></li>-->
									</ul>
									<p>'.$content.'</p>
									'.CHtml::link('Подробнее <i class="icon-angle-right"></i>',array('news/view','id'=>$n->id),array('class'=>'more')).'
								</div><hr>';
							}
							?>
						</div>
					</div>
					
					<div class="row">
						<!-- BEGIN RIGHT SIDEBAR -->      
						<div class="col-md-3 col-sm-3 blog-sidebar">
							  <!-- BEGIN RECENT NEWS -->                            
							  <h2>Последние новости</h2>
							  <div class="recent-news margin-bottom-10">
								
								<div class="row margin-bottom-10">
								  <?php
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
        
    </div>
</div>
