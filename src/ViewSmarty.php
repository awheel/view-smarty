<?php

namespace awheel\ViewSmarty;

use Smarty;

/**
 * View 层
 *
 * @package awheel
 */
class ViewSmarty
{
    /**
     * 配置
     *
     * @var array
     */
    protected $config = [];

    /**
     * 实例
     *
     * @var Smarty
     */
    protected $view;

    /**
     * 传递给 View 的数据
     *
     * @var array
     */
    protected $viewVars = [];

    /**
     * View 名称
     *
     * @var
     */
    protected $viewName;

    /**
     * 模板是否已经渲染过
     *
     * @var bool
     */
    protected $rendered = false;

    /**
     * View constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        $this->config = $config;

        $smarty = new Smarty();

        $smarty->error_reporting = error_reporting();
        $smarty->setTemplateDir($this->config['template_dir']);
        $smarty->setCompileDir($this->config['compile_dir']);
        $smarty->setConfigDir($this->config['config_dir']);
        $smarty->setCacheDir($this->config['cache_dir']);
        $smarty->setCaching($this->config['caching']);
        $smarty->addPluginsDir($this->config['plugin_dir']);
        $smarty->left_delimiter = $this->config['left_delimiter'];
        $smarty->right_delimiter = $this->config['right_delimiter'];

        $this->view = $smarty;

        return $this;
    }

    /**
     * 渲染
     *
     * @param $viewName
     * @param array $vars
     *
     * @return string
     */
    public function render($viewName, $vars = [])
    {
        $this->viewName = $viewName;
        $this->viewVars = array_merge($this->viewVars, (array) $vars);
        $this->view->assign($this->viewVars);

        ob_start();
        $this->view->display($this->viewName);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    /**
     * 给模板赋值
     *
     * @param $key
     * @param $value
     *
     * @return bool
     */
    public function assign($key, $value)
    {
        if ($this->rendered === true) {
            return false;
        }

        $this->viewVars = array_merge($this->viewVars, [$key => $value]);

        return $this;
    }

    /**
     * 获取当前 View 配置
     *
     * @return array
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * 获取传递给 view 的数据
     *
     * @return array
     */
    public function getVars()
    {
        return $this->viewVars;
    }
}
