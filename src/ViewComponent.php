<?php

namespace light\ViewSmarty;

use light\Component;

/**
 * View Blade
 *
 * @package light\ViewBlade
 */
class ViewComponent implements Component
{
    /**
     * 组件访问器
     *
     * @return mixed
     */
    public function getAccessor()
    {
        return 'view.smarty';
    }

    /**
     * 组件注册方法
     *
     * @return mixed
     */
    public function register()
    {
        $config = app()->configGet('view.smarty');

        if (app()->runningInConsole() || !$config) return [];

        return function () use ($config) {
            return new ViewSmarty($config);
        };
    }
}
