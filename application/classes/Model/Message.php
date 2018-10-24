<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_Message extends ORM {

    protected $_table_name = 'message';
    protected $_primary_key = 'message_id';
    protected $_has_many = array(
        'user' => array(
            'model' => 'User',
            'through' => 'message_user',
        ),
    );
    protected $_belongs_to = array(
        'lot' => array(
            'model' => 'Lot',
            'foreign_key' => 'lot_id',
        ),
    );

    public function rules() {
        return array(
            'lot_id' => array(
                array('not_empty'),
            ),
			'objet' => array(
                array('not_empty'),
            ),
            'texte_message' => array(
                array('not_empty'),
            ),
            'user_id' => array(
                array('not_empty'),
            ),
        );
    }

}
?>

