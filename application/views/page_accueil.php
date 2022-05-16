<section class="slider_section">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
          <li data-target="#myCarousel" data-slide-to="3"></li>
          <li data-target="#myCarousel" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">

            <div class="container">
              <div class="carousel-caption">
                <div class="row">
                  <div class="col-md-12">
                    <div class="text-bg">
                      <span>Bienvenue au </span>
                      <h1>Festival du raï</h1>
                      <p>Le Festival international du raï est un événement qui se tient tous les ans depuis 2007 à Oujda, au Maroc, près du stade d'Honneur d'Oujda. Il rassemble plusieurs artistes du raï et se tient le plus souvent en été.</p>
                      <a href="<?php echo base_url();?>index.php/actualite/afficher#MesActualites">Plus des actualitées</a> <a href="#">Achter un ticket</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php
      if($actu != NULL) {
        foreach($actu as $MonActu){
        ?>
        <div class="carousel-item">

            <div class="container ">
              <div class="carousel-caption">

                <div class="row">
                  <div class="col-md-12">
                    <div class="text-bg">
                        <span><?php echo $MonActu["act_Libelle"]; ?> </span>
                      <h1><?php echo $MonActu["act_DatePublication"]; ?></h1>
                      <p><?php echo $MonActu["act_Description"]; ?></p>
                      <a href="<?php echo base_url();?>index.php/actualite/afficher#MesActualites">Plus des actualitées</a><a href="#">Achter un ticket</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>

          <?php
        }
      }
    ?>

          <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
     
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
      
    </a>
   </div>
   </section>
</div>

