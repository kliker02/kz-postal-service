<?php

namespace Aleksandr\KzPostal\Core;

use Aleksandr\KzPostal\Controllers\Factory\IndexControllerFactory;
use Bramus\Router\Router;

class Application
{
    protected Router $Router;

    protected array $Config;

    public function __construct($Config) {
        $this->Config = $Config;
        $this->initRouter();
    }

    public function run(): void
    {
        try {
            $this->Router->run();
        } catch (\Exception $e) {
            http_response_code(501);
            $renderer = new TemplateRenderer();
            $renderer->render('error', 'incorrect-request', array('text'=>$e->getMessage()));
        }

    }


    /**
     * @return void
     */
    private function initRouter(): void
    {
        $this->Router = new Router();

        if (isset($this->Config['routes'])) {
            $Controllers = $this->Config['controllers'];
            foreach ($this->Config['routes'] as $arrRoute) {
                $this->Router->all($arrRoute['pattern'], function () use ($arrRoute, $Controllers) {
                    $controller = $arrRoute['options']['controller'];

                    if (!isset($Controllers[$controller])) {
                        throw new \Exception('Не найден контроллер в настройках системы');
                    }

                    $controller = (new $Controllers[$controller]())();
                    if (!method_exists($controller, $arrRoute['options']['action'])) {
                        throw new \Exception('В контроллере нет такого метода '.$arrRoute['options']['action']);
                    }
                    $arrParams = $controller->{$arrRoute['options']['action']}();
                    if (!is_array($arrParams)) {
                        $arrParams = array();
                    }


                    preg_match('/[a-zA-Z]+Controller$/', $arrRoute['options']['controller'], $controllerNames);

                    if (!count($controllerNames)) {
                        throw new \Exception('Имя контроллера не найдено');
                    }


                    $renderer = new TemplateRenderer();
                    $renderer->render(strtolower(str_replace('Controller', '', $controllerNames[0])), strtolower($arrRoute['options']['action']), $arrParams);
                });
            }

            $this->Router->set404(function() {
                http_response_code(404);
                $renderer = new TemplateRenderer();
                $renderer->render('error', 'index', array());
            });
        }
    }
}