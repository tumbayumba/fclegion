<?php
/* @var $this BlogsController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='ФК Легион | статьи';
Yii::app()->clientScript->registerMetaTag('ФК Легион статьи', 'description');
Yii::app()->clientScript->registerMetaTag('легион, статьи', 'keywords');
?>
<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><?php echo CHtml::link('Главная',array('/site/index'));?></li>
            <li class="active">Статьи</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>ФК Легион | статьи</h1>
            <div class="content-page">
              <div class="row">
                <!-- BEGIN LEFT SIDEBAR -->            
                <div class="col-md-9 col-sm-9 blog-posts">
                  
                  <?php
                  foreach($blogs as $blog){ ?>
                  
					  <div class="row">
						<div class="col-md-4 col-sm-4">
						  <!-- BEGIN CAROUSEL -->            
						  <div class="front-carousel">
							<?php echo '<div class="carousel slide" id="myCarousel'.$blog->id.'">';?>
							  <!-- Carousel items -->
							  <div class="carousel-inner">
								
								<?php
								$images = BlogsController::getImages($blog->id);
								$author = Users::model()->findByPk($blog->author_id);
								$content = $blog->content;
								$content = substr($content,0,200).'...';
								$cnt = 0;
								foreach($images as $image){
									($cnt==0)? $active='active' : $active='' ;
									echo '<div class="item '.$active.'">
											'.CHtml::image(Yii::app()->request->baseUrl.'/images/blogs/'.$blog->id.'/'.$image->image,'',array()).'
									  
									</div>';
									$cnt++;
								}	
								?>
								
							  </div>
							  <!-- Carousel nav -->
							  <?php if(count($images)>1){?>
							  <?php echo '<a data-slide="prev" href="#myCarousel'.$blog->id.'" class="carousel-control left">';?>
								<i class="fa fa-angle-left"></i>
							  </a>
							  <?php echo '<a data-slide="next" href="#myCarousel'.$blog->id.'" class="carousel-control right">';?>
								<i class="fa fa-angle-right"></i>
							  </a>
							  <?php } ?>
							</div>                
						  </div>
						  <!-- END CAROUSEL -->             
						</div>
						<div class="col-md-8 col-sm-8">
						  <h2><?php echo CHtml::link($blog->header,array('/blogs/view','id'=>$blog->id));?></h2>
						  <ul class="blog-info">
							<li><i class="fa fa-calendar"></i> <?php echo $blog->create_date;?></li>
							<li><i class="fa fa-user"></i> <?php echo $author->login;?></li>
							<!--<li><i class="fa fa-comments"></i> 17</li>-->
							<!--<li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li>-->
						  </ul>
						  <p><?php echo $content;?></p>
						  <?php echo CHtml::link('Читать <i class="icon-angle-right"></i>',array('/blogs/view','id'=>$blog->id),array('class'=>'more'));?>
						</div>
					  </div>
					  <hr class="blog-post-sep">
					  
				  <?php }
                  ?>
                  
                  <!--<ul class="pagination">
                    <li><a href="#">Prev</a></li>
                    <li><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li class="active"><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">Next</a></li>
                  </ul>-->
                                 
                </div>
                <!-- END LEFT SIDEBAR -->

                <!-- BEGIN RIGHT SIDEBAR -->            
                <div class="col-md-3 col-sm-3 blog-sidebar">
                  <!-- CATEGORIES START -->
                  <!--<h2 class="no-top-space">Categories</h2>
                  <ul class="nav sidebar-categories margin-bottom-40">
                    <li><a href="#">London (18)</a></li>
                    <li><a href="#">Moscow (5)</a></li>
                    <li class="active"><a href="#">Paris (12)</a></li>
                    <li><a href="#">Berlin (7)</a></li>
                    <li><a href="#">Istanbul (3)</a></li>
                  </ul>
                  <!-- CATEGORIES END -->

                  <!-- BEGIN RECENT NEWS -->                            
                  <h2>Статьи</h2>
                  <div class="recent-news margin-bottom-10">
                    
                    <?php
                    foreach($blogs as $blog){
						$author = Users::model()->findByPk($blog->author_id);
						echo '<div class="row margin-bottom-10">
						  <div class="col-md-3">
							'.CHtml::image(Yii::app()->request->baseUrl.'/images/avatars/'.$author->avatar,'',array('class'=>'img-responsive')).'                        
						  </div>
						  <div class="col-md-9 recent-news-inner">
							<h3>'.CHtml::link($blog->header,array('blogs/view','id'=>$blog->id)).'</h3>
							<p><i class="fa fa-calendar"></i> '.$blog->create_date.' <i class="fa fa-user"></i> '.$author->login.'</p>
						  </div>                        
						</div>';
					}
                    ?>
                    
                  </div>
                  
                  <h2>Последние новости</h2>
                  <div class="recent-news margin-bottom-10">
					<?php
					foreach($news as $n){
						$author = Users::model()->findByPk($n->author_id);
						echo '<div class="row margin-bottom-10">
							<div class="col-md-3">
								'.CHtml::image(Yii::app()->request->baseUrl.'/images/avatars/'.$author->avatar,'',array('class'=>'img-responsive')).'                        
							</div>
							<div class="col-md-9 recent-news-inner">
								<h3>'.CHtml::link($n->header,array('news/view','id'=>$n->id),array()).'</h3>
								<p><i class="fa fa-calendar"></i> '.$n->create_date.' <i class="fa fa-user"></i> '.$author->login.'</p>
							</div>
						</div>';
					}
					?>
				  </div>
                  <!-- END RECENT NEWS -->                            

                  <!-- BEGIN BLOG TALKS -->
                  <!--<div class="blog-talks margin-bottom-30">
                    <h2>Popular Talks</h2>
                    <div class="tab-style-1">
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#tab-1">Multipurpose</a></li>
                        <li><a data-toggle="tab" href="#tab-2">Documented</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab-1" class="tab-pane row-fluid fade in active">
                          <p class="margin-bottom-10">Raw denim you probably haven't heard of them jean shorts Austin. eu banh mi, qui irure terry richardson ex squid Aliquip placeat salvia cillum iphone.</p>
                          <p><a class="more" href="#">Read more</a></p>
                        </div>
                        <div id="tab-2" class="tab-pane fade">
                          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. aliquip jean shorts ullamco ad vinyl aesthetic magna delectus mollit. Keytar helvetica VHS salvia..</p>
                        </div>
                      </div>
                    </div>
                  </div>                            
                  <!-- END BLOG TALKS -->

                  <!-- BEGIN BLOG PHOTOS STREAM -->
                  <!--<div class="blog-photo-stream margin-bottom-20">
                    <h2>Photos Stream</h2>
                    <ul class="list-unstyled">
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/people/img5-small.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/works/img1.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/people/img4-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/works/img6.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/pics/img1-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/pics/img2-large.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/works/img3.jpg"></a></li>
                      <li><a href="#"><img alt="" src="../../assets/frontend/pages/img/people/img2-large.jpg"></a></li>
                    </ul>                    
                  </div>
                  <!-- END BLOG PHOTOS STREAM -->

                  <!-- BEGIN BLOG TAGS -->
                  <!--<div class="blog-tags margin-bottom-20">
                    <h2>Tags</h2>
                    <ul>
                      <li><a href="#"><i class="fa fa-tags"></i>OS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Metronic</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Dell</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Conquer</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>MS</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Google</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Keenthemes</a></li>
                      <li><a href="#"><i class="fa fa-tags"></i>Twitter</a></li>
                    </ul>
                  </div>
                  <!-- END BLOG TAGS -->
                </div>
                <!-- END RIGHT SIDEBAR -->            
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>

