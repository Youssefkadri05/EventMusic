<h2>Espace d'administration</h2>
<br />
<h2>Session ouverte ! Bienvenue
<?php

echo $this->session->userdata('Nom_admin');
unset($_SESSION);

?> !
</h2>