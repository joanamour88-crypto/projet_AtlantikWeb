<?php
if ($TitreDeLaPage == 'Saisie incorrecte')
  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation
?>
<div class="card-body shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 700px; width: 600px; margin: auto; margin-top: 100px;">
  <?php
    /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
    foreach ($infosclient as $uneinfoclient) {
      echo form_open('modifcompte');
      echo '<h2> Modifier information </h2>';
      echo csrf_field();
      echo form_label('Nom : ','txtNom');
      echo '<br>';
      echo form_input('txtNom',$uneinfoclient->NOM, set_value('txtNom'));    
      echo '<br>';
      echo form_label('Prenom : ','txtPrenom');
      echo '<br>';
      echo form_input('txtPrenom',$uneinfoclient->PRENOM, set_value('txtPrenom'));
      echo '<br>';
      echo form_label('Adresse : ','txtAdresse');
      echo '<br>';
      echo form_input('txtAdresse',$uneinfoclient->ADRESSE, set_value('txtAdresse'));
      echo '<br>';
      echo form_label('Code postale : ','txtCodePostale');
      echo '<br>';
      echo form_input('txtCodePostale',$uneinfoclient->CODEPOSTAL, set_value('txtCodePostale'));
      echo '<br>';
      echo form_label('Ville : ','txtVille');
      echo '<br>';
      echo form_input('txtVille',$uneinfoclient->VILLE, set_value('txtVille'));
      echo '<br>';
      echo form_label('Tel Fixe : ','txtTelFixe');
      echo '<br>';
      echo form_input('txtTelFixe',$uneinfoclient->TELEPHONEFIXE, set_value('txtTelFixe'));
      echo '<br>';
      echo form_label('Tel Mobile : ','txtTelMobile');
      echo '<br>';
      echo form_input('txtTelMobile',$uneinfoclient->TELEPHONEMOBILE, set_value('txtTelMobile'));
      echo '<br>';
      echo form_label('Mail : ','txtMail');
      echo '<br>';
      echo form_input('txtMail',$uneinfoclient->MEL, set_value('txtMail'));
      echo '<br>';
      echo form_label('Mot de passe : ','txtMdp');
      echo '<br>';
      echo form_input('txtMdp',$uneinfoclient->MOTDEPASSE, set_value('txtMdp'));
      echo '<br>';
      echo form_submit('submit', 'Modifier le Compte');
      echo form_close();
    }
    
  ?>
</div>