<?php
declare(strict_types=1);

namespace Backend\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    protected function initialize()
    {
        $this->tag->prependTitle('INVO | ');
        $this->view->setTemplateAfter('admin');

        $auth = $this->session->get('auth');
        $this->view->auth = $auth;
    }
}
