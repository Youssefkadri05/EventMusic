
<div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6">
                        <div class="about-text go-to">
                            <h3 class="dark-color"><?php echo $_SESSION['Nom_invite']; ?></h3>
                            <h6 class="theme-color lead">Biographie</h6>
                            <p><?php echo $_SESSION['piographie_invite']; ?></p>
                            <h6 class="theme-color lead">Description</h6>
                            <p><?php echo $_SESSION['description_invite']; ?></p>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img style="border-radius: 50%; height: 80%; width: 80%;" src="<?php echo base_url();?>style/images/<?php echo $_SESSION['photo_invite']; ?>" title="" alt="">
                        </div>
                    </div>
                </div>
                <div class="counter">
                    <div class="row">
                        <?php 
                        if (isset($ReseaxSocieux)) {
                            foreach ($ReseaxSocieux as $MyResaeu) {
                             ?>

                        
                           
                                <a href= '<?php echo $MyResaeu["URL"];?>'>
                                <img src=<?php echo base_url();  echo "style/icon/"; echo $MyResaeu["INTITULE"] ; echo "_50px.png" ; ?> alt=# />
                                 </a>
                                
                                
                           
                        
                        <?php   
                            }
                        }
                        ?>
                    </div>
                </div>
                <a href="<?php echo base_url();?>index.php/InviteEspace/afficherModifierProfilInvite">
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Modifier" style="MARGIN-LEFT: 40%;">
                </a>
            </div>