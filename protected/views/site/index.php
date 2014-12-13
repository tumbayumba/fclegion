<?php
/* @var $this SiteController */

$this->pageTitle='ФК Легион';
Yii::app()->clientScript->registerMetaTag('ФК Легион', 'description');
Yii::app()->clientScript->registerMetaTag('легион, легионеры', 'keywords');
?>
<!-- BEGIN SLIDER -->
    <div class="page-slider margin-bottom-40">
      <div class="fullwidthbanner-container revolution-slider">
        <div class="fullwidthabnner">
          <ul id="revolutionul">
            <!-- THE NEW SLIDE -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/img05.jpg" alt="">
              
              <div class="caption lft slide_title_white slide_item_left"
                data-x="30"
                data-y="90"
                data-speed="400"
                data-start="1500"
                data-easing="easeOutExpo">
                Вступай в ряды <br><span class="slide_title_white_bold">ЛЕГИОНА</span>
              </div>
              <!--<div class="caption lft slide_subtitle_white slide_item_left"
                data-x="87"
                data-y="245"
                data-speed="400"
                data-start="2000"
                data-easing="easeOutExpo">
                Мы из людей делаем богов
              </div>-->
              <!--<a class="caption lft btn dark slide_btn slide_item_left" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
                data-x="187"
                data-y="315"
                data-speed="400"
                data-start="3000"
                data-easing="easeOutExpo">
                Purchase Now!
              </a>-->                        
              <div class="caption lfb"
                data-x="640" 
                data-y="0" 
                data-speed="700" 
                data-start="1000" 
                data-easing="easeOutExpo">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/Ataka.jpg" alt="Image 1">
              </div>
            </li>    

            <!-- THE FIRST SLIDE -->
            <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/legion_row.jpg" alt="">
                            
              <!--<div class="caption lft slide_title slide_item_left"
                data-x="30"
                data-y="105"
                data-speed="400"
                data-start="1500"
                data-easing="easeOutExpo">
                Need a website design? 
              </div>-->
              <div class="caption lft slide_subtitle slide_item_left"
                data-x="30"
                data-y="180"
                data-speed="400"
                data-start="2000"
                data-easing="easeOutExpo">
                «Вени, види, вичи»
              </div>
              <div class="caption lft slide_desc slide_item_left"
                data-x="30"
                data-y="220"
                data-speed="400"
                data-start="2500"
                data-easing="easeOutExpo">
                (Пришел, увидел, победил)<br> — Гай Юлий Цезарь.
              </div>
              <!--<a class="caption lft btn green slide_btn slide_item_left" href="http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes"
                data-x="30"
                data-y="290"
                data-speed="400"
                data-start="3000"
                data-easing="easeOutExpo">
                Purchase Now!
              </a>-->                        
              <!--<div class="caption lfb"
                data-x="640" 
                data-y="55" 
                data-speed="700" 
                data-start="1000" 
                data-easing="easeOutExpo">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/man-winner.png" alt="Image 1">
              </div>-->
            </li>

            <!-- THE SECOND SLIDE -->
            <li data-transition="fade" data-slotamount="7" data-masterspeed="300" data-delay="9400" data-thumb="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">                        
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/maxresdefault.jpg" alt="">
              <!--<div class="caption lfl slide_title slide_item_left"
                data-x="30"
                data-y="125"
                data-speed="400"
                data-start="3500"
                data-easing="easeOutExpo">
                Powerfull &amp; Clean
              </div>-->
              <div class="caption lfl slide_subtitle slide_item_left"
                data-x="30"
                data-y="200"
                data-speed="400"
                data-start="4000"
                data-easing="easeOutExpo">
                «Победа любит осторожность»
              </div>
              <div class="caption lfl slide_desc slide_item_left"
                data-x="30"
                data-y="245"
                data-speed="400"
                data-start="4500"
                data-easing="easeOutExpo">
                — Латинская пословица.
              </div>                        
              <!--<div class="caption lfr slide_item_right" 
                data-x="635" 
                data-y="105" 
                data-speed="1200" 
                data-start="1500" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/mac.png" alt="Image 1">
              </div>
              <div class="caption lfr slide_item_right" 
                data-x="580" 
                data-y="245" 
                data-speed="1200" 
                data-start="2000" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/ipad.png" alt="Image 1">
              </div>
              <div class="caption lfr slide_item_right" 
                data-x="735" 
                data-y="290" 
                data-speed="1200" 
                data-start="2500" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/iphone.png" alt="Image 1">
              </div>
              <div class="caption lfr slide_item_right" 
                data-x="835" 
                data-y="230" 
                data-speed="1200" 
                data-start="3000" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/macbook.png" alt="Image 1">
              </div>
              <div class="caption lft slide_item_right" 
                data-x="865" 
                data-y="45" 
                data-speed="500" 
                data-start="5000" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/hint1-red.png" id="rev-hint1" alt="Image 1">
              </div>                        
              <div class="caption lfb slide_item_right" 
                data-x="355" 
                data-y="355" 
                data-speed="500" 
                data-start="5500" 
                data-easing="easeOutBack">
                <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/hint2-red.png" id="rev-hint2" alt="Image 1">
              </div>-->
            </li>
                        
            <!-- THE THIRD SLIDE -->
            <!--<li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
              <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/bg3.jpg" alt="">
              <div class="caption lfl slide_item_left" 
                data-x="30" 
                data-y="95" 
                data-speed="400" 
                data-start="1500" 
                data-easing="easeOutBack">
                <iframe src="http://player.vimeo.com/video/56974716?portrait=0" width="420" height="240" style="border:0" allowFullScreen></iframe> 
              </div>
              <div class="caption lfr slide_title"
                data-x="470"
                data-y="100"
                data-speed="400"
                data-start="2000"
                data-easing="easeOutExpo">
                Responsive Video Support
              </div>
              <div class="caption lfr slide_subtitle"
                data-x="470"
                data-y="170"
                data-speed="400"
                data-start="2500"
                data-easing="easeOutExpo">
                Youtube, Vimeo and others.
              </div>
              <div class="caption lfr slide_desc"
                data-x="470"
                data-y="220"
                data-speed="400"
                data-start="3000"
                data-easing="easeOutExpo">
                Lorem ipsum dolor sit amet, consectetuer elit sed diam<br> nonummy amet euismod dolore.
              </div>
              <a class="caption lfr btn yellow slide_btn" href=""
                data-x="470"
                data-y="280"
                                 data-speed="400"
                                 data-start="3500"
                                 data-easing="easeOutExpo">
                                 Watch more Videos!
                            </a>
                        </li>-->               
                        
                        <!-- THE FORTH SLIDE -->
                        <!--<li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/thumbs/thumb2.jpg">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <!--<img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/bg4.jpg" alt="">                        
                             <div class="caption lft slide_title"
                                 data-x="30"
                                 data-y="105"
                                 data-speed="400"
                                 data-start="1500"
                                 data-easing="easeOutExpo">
                                 What else included ?
                            </div>
                            <div class="caption lft slide_subtitle"
                                 data-x="30"
                                 data-y="180"
                                 data-speed="400"
                                 data-start="2000"
                                 data-easing="easeOutExpo">
                                 The Most Complete Admin Theme
                            </div>
                            <div class="caption lft slide_desc"
                                 data-x="30"
                                 data-y="225"
                                 data-speed="400"
                                 data-start="2500"
                                 data-easing="easeOutExpo">
                                 Lorem ipsum dolor sit amet, consectetuer elit sed diam<br> nonummy amet euismod dolore.
                            </div>
                            <a class="caption lft slide_btn btn red slide_item_left" href="http://www.keenthemes.com/preview/index.php?theme=metronic_admin" target="_blank" 
                                 data-x="30"
                                 data-y="300"
                                 data-speed="400"
                                 data-start="3000"
                                 data-easing="easeOutExpo">
                                 Learn More!
                            </a>                        
                            <div class="caption lft start"  
                                 data-x="670" 
                                 data-y="55" 
                                 data-speed="400" 
                                 data-start="2000" 
                                 data-easing="easeOutBack"  >
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/iphone_left.png" alt="Image 2">
                            </div>
                            
                            <div class="caption lft start"  
                                 data-x="850" 
                                 data-y="55" 
                                 data-speed="400" 
                                 data-start="2400" 
                                 data-easing="easeOutBack"  >
                                 <img src="<?php echo Yii::app()->request->baseUrl; ?>/assets/frontend/pages/img/revolutionslider/iphone_right.png" alt="Image 3">
                            </div>                        
                        </li>-->
                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
    </div>
    <!-- END SLIDER -->
    <div class="container">
		<!-- BEGIN BLOCKQUOTE BLOCK -->   
		<div class="row quote-v1 margin-bottom-30">
			<div class="col-md-9">
				<span >Последний результат: </span>
			</div>
			<div class="text-right">
				<span><b>Легион 6:3 Генератор</b></span>
				<!--<a class="btn-transparent" href="http://www.keenthemes.com/preview/index.php?theme=metronic_admin" target="_blank"><i class="fa fa-rocket margin-right-10"></i>Preview Admin</a>-->
			</div>
		</div>
		<!-- END BLOCKQUOTE BLOCK -->
		<div class="content-page">
          
          <div class="row">
			<div class="col-md-9 col-sm-9 blog-posts">
				<div class="row">
					
					<div class="col-md-4 col-sm-4">
                      <!-- BEGIN CAROUSEL -->            
                      <div class="front-carousel">
                        <?php echo '<div class="carousel slide" id="myCarousel'.$blog->id.'">';?>
                          <!-- Carousel items -->
                          <div class="carousel-inner">
                            <?php
								$content = $blog->content;
								$content = substr($content,0,200).'...';
								$cnt = 0;
								foreach($images as $image){
									($cnt==0)? $active='active' : $active='' ;
									echo '<div class="item '.$active.'">
											'.CHtml::image(Yii::app()->request->baseUrl.'/images/blogs/'.$blog->id.'/'.$image->image,'',array('style'=>'height:100%; width:100%;')).'
									  
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
                      <h2><?php echo CHtml::link($blog->header,array('/blogs/view','id'=>$blog->id));?></a></h2>
                      <ul class="blog-info">
                        <li><i class="fa fa-calendar"></i> <?php echo $blog->create_date;?></li>
                        <li><i class="fa fa-user"></i> <?php echo $author->login;?></li>
                        <!--<li><i class="fa fa-comments"></i> 17</li>
                        <li><i class="fa fa-tags"></i> Metronic, Keenthemes, UI Design</li>-->
                      </ul>
                      <p><?php echo $content;?></p>
                      <?php echo CHtml::link('Читать <i class="icon-angle-right"></i>',array('/blogs/view','id'=>$blog->id),array('class'=>'more'));?>
                    </div>
                    
                </div>
			</div>
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
                  <h2>Статьи</h2>
                  <div class="recent-news margin-bottom-10">
                    
                    <?php
                    foreach($blogs as $b){
						$a = Users::model()->findByPk($b->author_id);
						echo '<div class="row margin-bottom-10">
						  <div class="col-md-3">
							'.CHtml::image(Yii::app()->request->baseUrl.'/images/avatars/'.$a->avatar,'',array('class'=>'img-responsive')).'                        
						  </div>
						  <div class="col-md-9 recent-news-inner">
							<h3>'.CHtml::link($b->header,array('blogs/view','id'=>$b->id)).'</h3>
							<p><i class="fa fa-calendar"></i> '.$b->create_date.' <i class="fa fa-user"></i> '.$a->login.'</p>
						  </div>                        
						</div>';
					}
                    ?>
                    
                  </div>
                  <!-- END RECENT NEWS --> 		
			</div>
		  </div>
		  
		</div>
			
	</div>
