<?php

return array(
    'nom_projet' => array(
        'not_empty' => 'Le nom du projet doit être spécifié',
        'unique' => 'Ce nom de projet est déjà utilisé',
    ),
    'datetime_creation' => array(
        'not_empty' => 'La date de création doit être spécifié',
    ),
);
