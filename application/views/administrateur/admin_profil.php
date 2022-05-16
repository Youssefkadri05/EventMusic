
<div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-lg-6" style="
    margin-top: 15%;
">
                        <div class="about-text go-to">
                            <h3 class="dark-color" style="color:  red;">Profil</h3>
                            
                            
                            <div class="row about-list">
                                <div class="col-md-6">
                                    
                                    <div class="media">
                                        <span style="color:  red; font-weight: bold;">Pseudo</span>
                                        <p style="color: black;"><?php echo $_SESSION['username']; ?></p>
                                        
                                    </div>
                                    
                                    <div class="media">
                                        <span style="color:  red; font-weight: bold;">Nom</span>
                                        <p style="color: black;"><?php echo $_SESSION['Nom_admin']; ?></p>
                                        
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                    
                                    <div class="media">
                                        <span style="color:  red; font-weight: bold;">Email</span>
                                        <p style="color: black;"><?php echo $_SESSION['email_admin']; ?></p>
                                     
                                        
                                    </div>
                                    <div class="media">
                                        <span style="color:  red; font-weight: bold;">Prénom</span>
                                        <p style="color: black;"><?php echo $_SESSION['prenom_admin']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-avatar">
                            <img src="<?php echo base_url();?>/style/images/admin_settings_male_500px.png" title="" alt="">
                        </div>
                    </div>
                </div>
                <a href="<?php echo base_url();?>index.php/AdminEspace/afficherModifierProfilAdmin">
                    <input type="submit" class="btn btn-primary m-t-15 waves-effect" value="Modifier" style="MARGIN-LEFT: 40%;">
                </a>
                
            </div>