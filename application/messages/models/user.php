<?php

return array(

    'username' => array(
      'not_empty' => 'Le nom d\'utilisateur doit être spécifié',
      'min_length' => 'Le nom d\'utilisateur doit être composé d\'au moins :param2 caractères',
      'max_length' => 'Le nom d\'utilisateur ne peut pas être composé de plus de :param2 caractères',
      'unique' => 'Ce nom d\'utilisateur est déjà utilisé',
    ),

    'userlastname' => array(
      'not_empty' => 'Le nom doit être spécifié',
    ),

    'userfirstname' => array(
      'not_empty' => 'Le prénom doit être spécifié',
    ),

    'email' => array(
      'not_empty' => 'L\'adresse e-mail de l\'utilisateur doit être spécifiée',
      'min_length' => 'Cette adresse e-mail est trop courte: elle doit être composée d\'au moins :param2 caractères',
      'max_length' => 'Cette adresse e-mail est trop longue: elle ne peut être composée de plus de :param2 caractères',
      'email' =>   'L\'adresse e-mail saisie est invalide',
      'unique' => 'Cette adresse e-mail est déjà utilisée',
    ),

);
