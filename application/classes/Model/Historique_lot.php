<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Historique_lot extends ORM {

    protected $_table_name = 'historique_lot';
    protected $_primary_key = 'historique_lot_id';
    protected $_belongs_to = array(
        'etape_projet' => array(
            'foreign_key' => 'etape_projet_id',
        ),
        'lot' => array(
            'model' => 'Lot',
            'foreign_key' => 'lot_id',
        ),
    );

    public function rules() {
        return array(
            'datetime_debut' => array(
                array('not_empty'),
            ),
            'datetime_fin' => array(
                array('not_empty'),
            ),
            'etape_projet_id' => array(
                array('not_empty'),
            ),
            'historique_lot_id' => array(
                array('not_empty'),
            ),
            'lot_id' => array(
                array('not_empty'),
            ),
            'volume_doc' => array(
                array('not_empty'),
            ),
        );
    }
    
}
?>

