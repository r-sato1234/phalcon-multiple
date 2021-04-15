<?php
declare(strict_types=1);

namespace Backend\Controllers;

use Models\Items;


class ItemsController extends ControllerBase
{

    public function indexAction()
    {
        $this->view->items = Items::find();
    }

}

