<?php
if ($TitreDeLaPage == 'Saisie incorrecte')
  echo service('validation')->listErrors(); // affichage liste des erreurs, suite à erreur validation
?>
<div class="card-body shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 700px; width: 600px; margin: auto; margin-top: 100px;">
  <?php
    /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
    echo form_open('creeuncompte');
    echo '<h2> Inscription </h2>';
    echo csrf_field();
    echo form_label('Nom : ','txtNom');
    echo '<br>';
    echo form_input('txtNom', set_value('txtNom'));    
    echo '<br>';
    echo form_label('Prenom : ','txtPrenom');
    echo '<br>';
    echo form_input('txtPrenom', set_value('txtPrenom'));
    echo '<br>';
    echo form_label('Adresse : ','txtAdresse');
    echo '<br>';
    echo form_input('txtAdresse', set_value('txtAdresse'));
    echo '<br>';
    echo form_label('Code postale : ','txtCodePostale');
    echo '<br>';
    echo form_input('txtCodePostale', set_value('txtCodePostale'));
    echo '<br>';
    echo form_label('Ville : ','txtVille');
    echo '<br>';
    echo form_input('txtVille', set_value('txtVille'));
    echo '<br>';
    echo form_label('Tel Fixe : ','txtTelFixe');
    echo '<br>';
    echo form_input('txtTelFixe', set_value('txtTelFixe'));
    echo '<br>';
    echo form_label('Tel Mobile : ','txtTelMobile');
    echo '<br>';
    echo form_input('txtTelMobile', set_value('txtTelMobile'));
    echo '<br>';
    echo form_label('Mail : ','txtMail');
    echo '<br>';
    echo form_input('txtMail', set_value('txtMail'));
    echo '<br>';
    echo form_label('Mot de passe : ','txtMdp');
    echo '<br>';
    echo form_input('txtMdp', set_value('txtMdp'));
    echo '<br>';
    echo form_submit('submit', 'Crée le compte');
    echo form_close();
  ?>
</div>