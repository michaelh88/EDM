<?php

return array(

  'password' => array(
      'not_empty'  => 'Un mot de passe doit être spécifié.',
      'min_length' => 'Le mot de passe saisi doit comporter au moins 8 caractères.',
  ),

  'password_confirm' => array(
      'matches' => 'Le mot de passe et sa confirmation ne correspondent pas.',
  ),
);