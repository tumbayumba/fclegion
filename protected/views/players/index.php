<?php
/* @var $this PlayersController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>

<div class="main">
      <div class="container">
        <ul class="breadcrumb">
            <li><?php echo CHtml::link('Home',array('/site/index'));?></li>
            <li class="active">Состав</li>
        </ul>
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <!--<h1>Portfolio 4 Column</h1>-->
            <div class="content-page">
                <div class="filter-v1">
                  <!--<ul class="mix-filter">
                    <li data-filter="all" class="filter active">All</li>
                    <li data-filter="category_1" class="filter">UI Design</li>
                    <li data-filter="category_2" class="filter">Web Development</li>
                    <li data-filter="category_3" class="filter">Photography</li>
                    <li data-filter="category_3 category_1" class="filter">Wordpress and Logo</li>
                  </ul>-->
                              <div class="row mix-grid thumbnails">
								  <?php 
								  foreach($players as $player){
									  echo '<div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
											<div class="mix-inner">';
											   //echo '<img alt="" src="../../assets/frontend/pages/img/works/img1.jpg" class="img-responsive">';
											   echo '<img alt="" src="/images/players/'.$player->image.'" class="img-responsive">';
											   echo '<div class="mix-details">
												  <h4>'.$player->firstname.' '.$player->lastname.'</h4>
												  <a class="mix-link"><i class="fa fa-link"></i></a>
												  <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img1.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
											   </div>           
											</div>                       
										  </div>';
								  }
								  ?>
                                  <!--<div class="col-md-3 col-sm-4 mix category_1 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                       <img alt="" src="../../assets/frontend/pages/img/works/img1.jpg" class="img-responsive">
                                       <div class="mix-details">
                                          <h4>Cascusamus et iusto odio</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img1.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                       </div>           
                                    </div>                       
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 mix_all" style="display: block; opacity: 1; ">
                                       <div class="mix-inner">
                                          <img alt="" src="../../assets/frontend/pages/img/works/img2.jpg" class="img-responsive">
                                          <div class="mix-details">
                                             <h4>Cascusamus et iusto accusamus</h4>
                                             <a class="mix-link"><i class="fa fa-link"></i></a>
                                             <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img2.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                          </div>               
                                       </div>                    
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_3 mix_all" style="display: block; opacity: 1; ">
                                       <div class="mix-inner">
                                          <img alt="" src="../../assets/frontend/pages/img/works/img3.jpg" class="img-responsive">
                                          <div class="mix-details">
                                             <h4>Cascusamus et iusto accusamus</h4>
                                             <a class="mix-link"><i class="fa fa-link"></i></a>
                                             <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img3.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>
                                          </div>              
                                      </div>      
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                                       <div class="mix-inner">
                                         <img alt="" src="../../assets/frontend/pages/img/works/img4.jpg" class="img-responsive">
                                         <div class="mix-details">
                                             <h4>Cascusamus et iusto accusamus</h4>
                                             <a class="mix-link"><i class="fa fa-link"></i></a>
                                             <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img4.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>                            
                                         </div>                  
                                      </div>                      
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 category_1 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                      <img alt="" src="../../assets/frontend/pages/img/works/img5.jpg" class="img-responsive">
                                      <div class="mix-details">
                                          <h4>Cascusamus et iusto accusamus</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img5.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>                            
                                      </div>     
                                      </div>                                   
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                      <img alt="" src="../../assets/frontend/pages/img/works/img6.jpg" class="img-responsive">
                                      <div class="mix-details">
                                          <h4>Cascusamus et iusto accusamus</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img6.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>                            
                                      </div>     
                                      </div>                                   
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_2 category_3 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                      <img alt="" src="../../assets/frontend/pages/img/works/img1.jpg" class="img-responsive">
                                      <div class="mix-details">
                                          <h4>Cascusamus et iusto accusamus</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img1.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>                            
                                      </div>    
                                      </div>                                    
                                  </div>
                                  <div class="col-md-3 col-sm-4 mix category_1 category_2 mix_all" style="display: block; opacity: 1; ">
                                    <div class="mix-inner">
                                      <img alt="" src="../../assets/frontend/pages/img/works/img2.jpg" class="img-responsive">
                                      <div class="mix-details">
                                          <h4>Cascusamus et iusto accusamus</h4>
                                          <a class="mix-link"><i class="fa fa-link"></i></a>
                                          <a data-rel="fancybox-button" title="Project Name" href="../../assets/frontend/pages/img/works/img2.jpg" class="mix-preview fancybox-button"><i class="fa fa-search"></i></a>                            
                                      </div>   
                                      </div>                                     
                                  </div>-->
                              </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- BEGIN SIDEBAR & CONTENT -->
      </div>
    </div>
