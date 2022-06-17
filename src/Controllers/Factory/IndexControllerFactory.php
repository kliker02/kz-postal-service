<?php

namespace Aleksandr\KzPostal\Controllers\Factory;

use Aleksandr\KzPostal\Controllers\IndexController;

class IndexControllerFactory
{
    /**
     * @return IndexController
     */
    public function __invoke() {
        return new IndexController();
    }

}