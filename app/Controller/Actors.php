<?php
declare(strict_types=1);
namespace App\Controller;
use App\View\Renderer;
class Actors extends AbstractController
{
    public function execute()
    {
        $this->renderHtml('actors.phtml');
    }
    /**
     * @return array
     */
    public function getActors(): array
    {
        $db = \App\Models\Db::getDbh()->prepare('SELECT * FROM actors');
        $db->execute();
        return $db->fetchAll();
    }
}