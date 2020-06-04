<?php


namespace App\Controller;

use App\View\Movies;

class ProducerFilterController
{
    public function execute() {
        $view = new Movies();
        $result = $view->render();
        return $result;
    }
}