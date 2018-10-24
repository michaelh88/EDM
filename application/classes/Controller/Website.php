<?php

defined('SYSPATH') or die('No direct script access.');

require_once(Kohana::find_file('vendor', 'Vivetic/Files'));

abstract class Controller_Website extends Controller_Template {

    public $template = 'layouts/main';
    protected $page_title = 'FTHM Web';
    protected $current_user = null;
    protected $current_user_role = null;
    protected $csslib = array(
        'jMenu.jquery',
        'jquery.qtip.min'
    );
    protected $css = array(
        'common',
        'main'
    );
    protected $jslib = array(
        'jquery-1.8.0.min',
        'jquery-ui-1.8.22.min',
        'jMenu.jquery.min',
        'jquery.msgbox.min',
        'jquery.qtip.min',
        'soundmanager2-jsmin'
    );
    protected $js = array(
        'common',
        'main'
    );
    private $isAjaxOrPostRequest = false;

    public function before() {

        if (!($this->current_user = Auth::instance()->get_user())
                || !Auth::instance()->logged_in()
                || !($this->current_user_role = $this->current_user->roles->where('name', '!=', 'login')->find()))
			HTTP::redirect('/session/logout');
        $this->current_user_projet = 0;
        // On filtre les requêtes Ajax ou Post afin de ne pas instancier inutilement la vue "layout"
        if (!($this->isAjaxOrPostRequest = preg_match('@^ajax_.*@i', $this->request->action()) || preg_match('@^post_.*@i', $this->request->action()))) {

            parent::before();

            $this->template->header = View::factory('layouts/header');
            $this->template->header->msg_welcome = $this->current_user->getMsgWelcome();

            $this->template->header->msg_alerts = '';

            $this->template->menu = View::factory('layouts/menu');
            $this->template->menu->current_user_role_name = $this->current_user_role->name;

            $this->template->footer = View::factory('layouts/footer');

            $this->template
                    ->bind('csslib', $this->csslib)
                    ->bind('css', $this->css)
                    ->bind('jslib', $this->jslib)
                    ->bind('js', $this->js);

            $curActionFullPath = $this->request->controller() . '/' . $this->request->action();

            $curCss = Files::concat_paths(DOCROOT, 'public/css/contents/' . $curActionFullPath . '.css');
            file_exists($curCss)
                    && $this->css[] = $curActionFullPath;

            $curJs = Files::concat_paths(DOCROOT, 'public/js/contents/' . $curActionFullPath . '.js');
            file_exists($curJs)
                    && $this->js[] = $curActionFullPath;


            // Make $page_title available to all views
            View::bind_global('page_title', $this->page_title);
        }
    }

    public function after() {

        if (!$this->isAjaxOrPostRequest)
            parent::after();
    }

}
