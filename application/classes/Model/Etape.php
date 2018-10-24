<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Etape extends ORM {

    protected $_table_name = 'etape';
    protected $_primary_key = 'etape_id';
    protected $_has_many = array(
        'projet' => array(
            'model' => 'Projet',
            'through' => 'etape_projet'
        ),
    );

    public function rules() {
        return array(
            'libelle' => array(
                array('not_empty'),
                array(array($this, 'unique'), array('libelle', ':value')),
            ),
            'defaut' => array(
                array('not_empty'),
            ),
        );
    }

}
?>

