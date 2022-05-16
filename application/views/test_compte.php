
<h1><?php echo $titre;?></h1>
<br />

<?php
if($pseudos != NULL) {
foreach($pseudos as $login){
 echo "<br />";
 echo " -- ";
echo $login["cmpt_login"];
echo " -- ";
echo "<br />";
}
}
else {echo "<br />";
echo "Aucun compte !";
}
?>
