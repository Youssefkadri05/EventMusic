<dir id="MesActualites" class="text-bg"> <span>Gallerie</span>  </dir>
<div class="container marketing" id="MesInvites">

    <!-- Three columns of text below the carousel -->
    <div class="row">

<?php

      if($invit != NULL) {
        
        foreach($invit as $a){
          
          if (!isset($traite[$a["inv_id"]])){
            $cpt_id=$a["inv_id"];
            
            if (!isset($traite[$a["pos_id"]])){
              $res_id=$a["pos_id"];
            
              echo '<div style="border: solid 10px white;background-color: black;" class="col-lg-4">

        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
          <div class="about-box">
            <figure><img style="border-radius : 50%" src="';  echo base_url(); echo 'style/images/'.$a["inv_photo"].'" alt="#" /></figure>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
          </div><title>Placeholder</title><rect width="100%" height="100%" fill="#777"> </rect></svg>';
          ?>
        
          <h2 class="MaGallerieH2" style="color: aliceblue;" > <?php echo $a["inv_nom"]; ?> </h2>

          <ul class='MaGallerieH2'>
            <?php 

            
            foreach($invit as $MyAni){
              $Nbr_deReseau = 0;
              if(strcmp($cpt_id,$MyAni["inv_id"])==0 ){
                if(strcmp($res_id,$MyAni["pos_id"])==0 ){
                  if ($MyAni["res_url"] != NULL ) {
                  $Nbr_deReseau = 1;
            ?>
            <a href= '<?php echo $MyAni["res_url"];?>'>
              <img src=<?php echo base_url();  echo "style/icon/"; echo $MyAni["res_libelle"] ; echo "_50px.png" ; ?> alt=# />
            </a>
            <?php 
                }
                if ($Nbr_deReseau==0) {
                  ?>
                  <a href="#"><img src=" <?php echo base_url();  echo "style/icon/oops_50px.png" ; ?>" alt="#" /></a>
                  <?php
                  echo "<b style='color: aliceblue;'>Pas de réseaux socieux!!</b>";
                }
              }
            }
          }
      ?>

          </ul>
       
        <?php
        
        foreach($invit as $MyAni){
              $Nbr_dePost = 0;
              echo "<ul style='color: aliceblue;'>";
              if(strcmp($cpt_id,$MyAni["inv_id"])==0 && strcmp($a["res_id"],$MyAni["res_id"])==0 ){
                if ($MyAni["pos_texte"] != NULL ) {
                    $Nbr_dePost = 1;
                  echo "<li style=' list-style: square;' >";
                  echo '<p>'.$MyAni["pos_texte"].'</p>';
                  echo "</li>";
                }
                if ($Nbr_dePost==0) {
                  echo "<br /> ";
                        ?>
                      <div class="pasDeResultat" style="background-color: #f44336;">Aucune post pour l'instant !</div>
                      <?php
                }
                
                
              }
            echo "</ul>";
            }
        echo'</div><!-- /.col-lg-4 -->';
        if ($a["pos_id"]!=NULL) {
          $traite[$a["pos_id"]]=1; 
        }
        
      }
      $traite[$a["inv_id"]]=1;      
      }
      
      } 
      echo "</div></div>";
    }
      else {
        echo "</div></div>";
        echo "<br /> ";
        ?>
        <div class="pasDeResultat">Aucune invité pour l'instant !</div>
        <?php
      }
?>
      
      
    <!-- /END THE FEATURETTES -->
  

  






