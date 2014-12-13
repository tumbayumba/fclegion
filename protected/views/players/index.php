<?php
/* @var $this PlayersController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle='ФК Легион | легионеры';
Yii::app()->clientScript->registerMetaTag('легионеры', 'description');
Yii::app()->clientScript->registerMetaTag('легионеры, легион, роспопов', 'keywords');
?>

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><?php echo CHtml::link('Главная',array('/site/index'));?></li>
            <li class="active">Состав</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <div class="col-md-12 col-sm-12">
            <h1>ФК Легион | легионеры</h1><hr>
            <div class="content-page">
                <div class="filter-v1">
					<ul class="mix-filter">
						<?php
						foreach($players as $player){
							echo '<li class="filter">'.CHtml::link($player->lastname,array(),array('style'=>'text-decoration:none;')).'</li>';
						}
						?>
                    </ul>
                  <!--<ul class="mix-filter">
                    <li data-filter="all" class="filter active">All</li>
                    <li data-filter="category_1" class="filter">UI Design</li>
                    <li data-filter="category_2" class="filter">Web Development</li>
                    <li data-filter="category_3" class="filter">Photography</li>
                    <li data-filter="category_3 category_1" class="filter">Wordpress and Logo</li>
                  </ul>-->
                              <div class="row mix-grid thumbnails">
								  <?php 
								  shuffle($players);
								  foreach($players as $player){
									  $deg = rand(-15,15);
									  echo '<div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display:block; opacity:1; 
														-ms-transform: rotate('.$deg.'deg); /* IE 9 */
														-webkit-transform: rotate('.$deg.'deg); /* Chrome, Safari, Opera */
														transform: rotate('.$deg.'deg);
														">
											<div class="mix-inner" style="box-shadow: 7px 7px 5px #888888;">';
											   //echo '<img alt="" src="../../assets/frontend/pages/img/works/img1.jpg" class="img-responsive">';
											   echo CHtml::image(Yii::app()->request->baseUrl.'/images/players/'.$player->image,'',array('class'=>'img-responsive'));
											   echo '<div class="mix-details">';
												  echo '<h4>'.$player->firstname.' '.$player->lastname.'</h4>
												  <a class="mix-link"><i class="fa fa-link"></i></a>';
												  //echo CHtml::link('<i class="fa fa-search"></i>',array(Yii::app()->request->baseUrl.'/images/players/'.$player->image),array('class'=>'mix-preview fancybox-button','data-rel'=>'fancybox-button','title'=>$player->lastname));
												  echo '<a data-rel="fancybox-button" title="'.$player->firstname.' '.$player->alias.' '.$player->lastname.'" href="'.Yii::app()->request->baseUrl.'/images/players/'.$player->image.'" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>';
											   echo '</div>           
											</div>                       
										  </div>';
								  }
								  ?>
                              </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
