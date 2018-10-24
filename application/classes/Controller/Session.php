<?php defined('SYSPATH') or die('No direct script access.');

final class Controller_Session extends Controller {

    final public function action_login()
    {
	if (Auth::instance()->get_user()) {
	  HTTP::redirect('/Lot/list');
	}

        $layout = View::factory('layouts/login');
		$layout->page_title = 'Connexion';

        $layout->content = View::factory('contents/Session/login')
            ->bind('message', $message);

        if (HTTP_Request::POST == $this->request->method())
        {
	    $user_save = ORM::factory('User', array('username' => $this->request->post('username')));
	    $user_save == ""
	      && $user_save = ORM::factory('User',array('email' => $this->request->post('username')));
            $user = Auth::instance()->login($this->request->post('username'), $this->request->post('password'));

            // If successful, redirect user
            if ($user)
            {
	      if ($user_save != "") {
		$user_modif = ORM::factory('User',$user_save->id);
		$user_modif->lastlast_login = $user_save->last_login;
		$user_modif->save();
	      }
	      HTTP::redirect('/Lot/list');
            }
            else
            {
	      $message = Kohana::message('misc','session.err_user');
            }
        }

        $this->response->body($layout);
    }

    final public function action_logout()
    {
        Auth::instance()->logout(true, true);
        HTTP::redirect('/');
    }

    final public function action_setClientTimezoneInSeconds() {

      if (($timezoneName = $this->request->post('timezone')) != null) {

	$time = new DateTime('now', new DateTimeZone($timezoneName));
	$timezoneOffset = $time->format('Z');
	Session::instance()->set('clTzSec', $timezoneOffset);
      }
    }

}
