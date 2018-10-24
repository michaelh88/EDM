<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Lot extends ORM {

    protected $_table_name = 'lot';
    protected $_primary_key = 'lot_id';
    protected $_has_many = array(
        'etape_projet' => array(
            'model' => 'Etape_projet',
            'through' => 'historique_lot',
        ),
    );
    protected $_belongs_to = array(
        'projet' => array(
            'model' => 'Projet',
            'foreign_key' => 'projet_id',
        ),
    );

    public function rules() {
        return array(
            'nombre_doc' => array(
                array('not_empty'),
            ),
            'nom_zip' => array(
                array('not_empty'),
            ),
            'projet_id' => array(
                array('not_empty'),
            ),
        );
    }

}
?>

