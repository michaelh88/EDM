<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Etape_Projet extends ORM {

    protected $_table_name = 'etape_projet';
    protected $_primary_key = 'etape_projet_id';
    protected $_belongs_to = array(
        'projet' => array(
            'model' => 'Projet',
            'foreign_key' => 'projet_id',
        ),
        'etape' => array(
            'model' => 'Etape',
            'foreign_key' => 'etape_id',
        ),
    );

    public function rules() {
        return array(
            'delai' => array(
                array('not_empty'),
            ),
            'etape_id' => array(
                array('not_empty'),
            ),
            'ordre' => array(
                array('not_empty'),
            ),
            'projet_id' => array(
                array('not_empty'),
            ),
        );
    }

}
?>

