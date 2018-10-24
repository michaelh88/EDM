<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Projet extends ORM {

    protected $_table_name = 'projet';
    protected $_primary_key = 'projet_id';
    protected $_has_many = array(
        'role' => array(
            'model' => 'Role',
            'through' => 'roles_users'
        ),
        'etape' => array(
            'model' => 'Etape',
            'through' => 'etape_projet'
        ),
    );

    public function rules() {
        return array(
            'nom_projet' => array(
                array('not_empty'),
                array(array($this, 'unique'), array('nom_projet', ':value')),
            ),
            'datetime_creation' => array(
                array('not_empty'),
            ),
        );
    }
}
?>

