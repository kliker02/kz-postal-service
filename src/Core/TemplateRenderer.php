<?php

namespace Aleksandr\KzPostal\Core;

class TemplateRenderer
{
    /**
     * @throws \Exception
     */
    public function render($controller, $action, $params) {
        if (!file_exists(getcwd().'/theme/'.$controller.'/'.$action.'.php')) {
            throw new \Exception('Не найден файл для рендера');
        }

        include getcwd().'/theme/'.$controller.'/'.$action.'.php';
    }
}