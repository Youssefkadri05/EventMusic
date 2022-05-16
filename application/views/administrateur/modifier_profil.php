
        <div class="container-fluid">
            <div class="block-header">
                <h2>Mon Profil</h2>
            </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                VERTICAL LAYOUT
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!--<form> -->
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('compte/setPassword'); ?>
                                
                                
                                <label for="email_address">Nom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="nom" type="text"  class="form-control" placeholder="Nom" value="<?php echo $_SESSION['Nom_admin']; ?>" >
                                    </div>
                                </div>
                                <label for="email_address">Prénom</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="prenom" type="text"  class="form-control" placeholder="Prénom" value="<?php echo $_SESSION['prenom_admin']; ?>" >
                                    </div>
                                </div>
                                <label for="email_address">Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="email" type="text"  class="form-control" placeholder="Email" value="<?php echo $_SESSION['email_admin']; ?>" >
                                    </div>
                                </div>

                                
                                <label for="password">Entrez le nouveau  mot de passe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="nouveau_password" maxlength="64" type="password"  class="form-control" placeholder="Entrez le nouveau  mot de passe">
                                    </div>
                                </div>

                                <label for="password">confirmer le nouveau mot de passe</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input name="password_confirmer" maxlength="64" type="password"  class="form-control" placeholder="confirmer le mot de passe">
                                    </div>
                                </div>

                                <br>
                                <input type="submit"  class="btn btn-primary m-t-15 waves-effect" value="Modifier">
                                <a href="<?php echo base_url();?>index.php/AdminEspace/afficherAccueil">
                                     <input  type="button" class="btn btn-primary m-t-15 waves-effect" value="Annuler" style="background-color: red !important;">
                                </a>    
                            </form>
                        </div>
                    </div>
                </div>
            </div>
