<!DOCTYPE html>
<html lang="en">

<head>
  <!-- basic -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- mobile metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="initial-scale=1, maximum-scale=1">
  <!-- site metas -->
  <title>Accueil</title>
  <meta name="keywords" content="">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- fevicon -->
  <link rel="icon" href="<?php echo base_url();?>style/images/fevicon.png" type="image/gif" />
  <link rel="stylesheet" href="<?php echo base_url();?>style/css/MyStyle.css">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="<?php echo base_url();?>style/css/bootstrap.min.css">
  <!-- style css -->
  <link rel="stylesheet" href="<?php echo base_url();?>style/css/style.css">
  <!-- Responsive-->
  <link rel="stylesheet" href="<?php echo base_url();?>style/css/responsive.css">  
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url();?>style/css/jquery.mCustomScrollbar.min.css">
  <!-- Tweaks for older IEs-->
  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
  <link href="<?php echo base_url();?>style/css/styleForInvite.css" rel="stylesheet">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
  <!-- loader  -->
  <div class="loader_bg">
    <div class="loader"><img src="<?php echo base_url();?>style/images/loading.gif" alt="#" /></div>
  </div>
  <!-- end loader -->
  <!-- header -->
  <header>
    <!-- header inner -->
    <div class="header-top">
      <div class="header">
        <div class="container">
          <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-3 col logo_section">
              <div class="full">
                <div class="center-desk">
                  <div class="logo">
                    <a href="index.html"><img src="<?php echo base_url();?>style/images/logo.png" alt="#" /></a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-10 col-lg-10 col-md-10 col-sm-9">
              
               <div class="menu-area">
                <div class="limit-box">
                  <nav class="main-menu ">
                    <ul class="menu-area-main">
                      <li class="active"> <a href="<?php echo base_url();?>index.php/actualite/afficher#MesActualites">Accuiel</a> </li>
                  
                      <li> <a href="<?php echo base_url();?>index.php/animation/afficherAnimations#MonProgrammation">Programmation</a> </li>
                      <li> <a href="<?php echo base_url();?>index.php/invite/afficherInvites#MesInvites">Invités </a> </li>
                      <li> <a href="<?php echo base_url();?>index.php/lieu/afficherLieux#MesLieux">Lieux & Services</a> </li>
                      <li> <a href="<?php echo base_url();?>index.php/compte/connecter#MaPageDeConnexion">Se connecter</a> </li>
      
                      
                      <li  > <a  class="last_manu" href="#"><img src="<?php echo base_url();?>style/images/search_icon.png" alt="#" /></a> </li>
                      
                     </ul>
                   </nav>
                
               </div> 
             </div>
           </div>
         </div>
       </div>
     </div>
     <!-- end header inner -->