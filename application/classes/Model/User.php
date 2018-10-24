<?php

defined('SYSPATH') OR die('No Direct Script Access');

final class Model_User extends Model_Auth_User {

    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_has_many = array(
        'user_tokens' => array(
            'model' => 'user_token'
        ),
        'roles' => array(
            'model' => 'Role',
            'through' => 'roles_users'
        ),
        'message' => array(
            'model' => 'Message',
            'through' => 'message_user'
        ),
    );

    public function rules() {
        return array(
            'email' => array(
                array('not_empty'),
                array('email'),
                array(array($this, 'unique'), array('email', ':value')),
            ),
            'username' => array(
                array('not_empty'),
                array('max_length', array(':value', 32)),
                array(array($this, 'unique'), array('username', ':value')),
            ),
            'userlastname' => array(
                array('not_empty'),
            ),
            'userfirstname' => array(
                array('not_empty'),
            ),
            'password' => array(
                array('not_empty'),
            ),
        );
    }

    final public function getMsgWelcome() {

        $config = Kohana::$config->load('website');
        $msg = $config->get('msg_user_welcome');

        $clTzSec = Session::instance()->get('clTzSec');
        $lastlastLogin = '<i>première connexion</i>';
        if ($this->lastlast_login != NULL) {

            $lastlastLoginDT = new DateTime();
            $lastlastLoginDT->setTimezone(new DateTimezone('UTC'));
            $lastlastLoginDT->setTimestamp($this->lastlast_login);
            $lastlastLoginDT = date_add($lastlastLoginDT, DateInterval::createFromDateString($clTzSec . ' seconds'));
            $lastlastLogin = $lastlastLoginDT->format('d/m/Y H:i:s');
        }

        return strtr($msg, array(
                    '%name' => ucfirst(strtolower($this->userfirstname)) . ' ' . ucfirst(strtolower($this->userlastname)),
                    '%email' => $this->email,
                    '%lastLogin' => $lastlastLogin,
                    '%role' => ucfirst(strtolower($this->roles->where('name', '!=', 'login')->find()->description)),
                ));
    }

}

?>
