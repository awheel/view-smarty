<?php

namespace App\Controller;

use awheel\Routing\Controller;

/**
 * Class HomeController
 *
 * @package App\Controller
 */
class HomeController extends Controller
{
    /**
     * Home
     *
     * @return mixed
     */
    public function home()
    {
        return app('view.smarty')->render('test/smarty.tpl', ['title' => 'smarty']);
    }
}
