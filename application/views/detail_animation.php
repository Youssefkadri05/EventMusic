
<section class="section about-section gray-bg" id="MyDetailAnimation">
            <div class="container">
              
                <div class="row align-items-center flex-row-reverse">
                  <?php if ($actu != NULL){ ?>
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <?php foreach($anim as $a){ 
                              if (!isset($traite[$a["ani_id"]])){
                                  $cpt_id=$a["ani_id"];?>
                            <h3 class="dark-color"><?php echo $a["ani_libelle"]; ?></h3>
                            <h6 class="theme-color lead">Description</h6>
                            <p><?php echo $a["ani_description"]; ?></p>
                            <h6 class="theme-color lead">Date de début</h6>
                            <p><?php echo $a["ani_dateDebut"]; ?></p>
                            <h6 class="theme-color lead">Date de fin</h6>
                            <p><?php echo $a["ani_dateFin"]; ?></p>
                            <h6 class="theme-color lead">Lieu</h6>
                            <p><?php echo $a["lie_nom"]; ?></p>
                            
                            
                               
                                
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                           <img src="<?php echo base_url();?>/style/images/search_in_list_500px.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                  <h6 class="theme-color lead">Invités :</h6>
                    <div class="row">
                        <?php foreach($anim as $MyAni){
                                        if(strcmp($cpt_id,$MyAni["ani_id"])==0){
                                          if ($MyAni["inv_nom"]==NULL) {
                                            echo "<img src='"; echo base_url(); echo "style/icon/oops_40px.png'"."alt="."# />";
                                          echo "<br>Pas des invités pour l'instant";}
                                           else { ?>
                                            <div class="col-6 col-lg-3">
                            <div class="count text-center">
                                <img src="<?php echo base_url(); echo 'style/images/'; echo $MyAni["inv_photo"];?> " width="48" height="48" alt="User" style="border-radius: 50%;" />
                                <p class="m-0px font-w-600"><?php echo $MyAni["inv_nom"]; ?></p>
                            </div>
                        </div>
                                      <?php }
                                    }
                                     }
                                     $traite[$a["ani_id"]]=1;
                                 }
                               }
                             } ?>

                        
                        
                        
                    </div>
                </div>
            </div>
        </section>