<div class="card-body shadow d-flex justify-content-center align-items-center" style="text-align: center; height: 600px; width: 500px; margin: auto; margin-top: 100px;">
  <?php
  /* set_value : en cas de non validation, les données déjà saisies sont réinjectées dans le formulaire */
  
  echo form_open('seconnecter');
  echo csrf_field();
  echo '<img src="/assets/images/Image Atlantik (ChatGPT).png" alt="Logo Atlantik" style="width: 150px; height: auto;">';
  echo '<H2> Connexion </H2>';
  echo '<p> Saisissez votre email pour vous identifier </p>';
  echo '<br>';
  echo form_label('Email : ','txtMail');
  echo '<br>';
  echo form_input('txtMail', set_value('txtMail'));    
  echo '<br>';
  echo form_label('Mot de passe : ','txtMotDePasse');
  echo '<br>';
  echo form_password('txtMotDePasse', set_value('txtMotDePasse'));
  echo '<br>';
  echo form_submit('submit', 'Se connecter', 'class="btn btn-primary"');
  echo '<br>';
  echo '<button type="button" class="btn btn-primary" onclick="window.location.href=\'/creeuncompte\'">Crée un compte</button>';
  echo form_close();
  ?>
</div>

