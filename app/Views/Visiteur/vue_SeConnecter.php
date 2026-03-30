<?php
  /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
  echo form_open('seconnecter');
  echo csrf_field();
  echo form_label('Identifiant : ','txtIdentifiant');
  echo form_input('txtIdentifiant', set_value('txtIdentifiant'));    
  echo '<br>';
  echo form_label('Mot de passe : ','txtMotDePasse');
  echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
  echo '<br>';
  echo form_submit('submit', 'Se connecter');
  echo form_close();
?>
<a class="button" href="<?php echo site_url('creeuncompte') ?>">Se Crée un compte</a>