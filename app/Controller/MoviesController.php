<?php
declare(strict_types=1);
namespace App\Controller;
use App\View\Movies;
use App\Models\Db;
use App\View\Renderer;
use App\Services\ProducerFilterService;

class MoviesController extends AbstractController
{
    public function execute()
    {
        $this->renderHtml('movies.phtml');
    }
    /**
     * @return array
     */
    public function getFilms(): array
    {
        $db = \App\Models\Db::getDbh()->prepare('SELECT * FROM movies');
        $db->execute();
        return $db->fetchAll();
    }
    public function getProducers(): array
    {
        $db = \App\Models\Db::getDbh()->prepare('SELECT * FROM producers');
        $db->execute();
        return $db->fetchAll();
    }
}