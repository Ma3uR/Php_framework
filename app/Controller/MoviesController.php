<?php
declare(strict_types=1);
namespace App\Controller;
use App\View\Movies;
use App\Models\Db;
use App\View\Renderer;
use App\Models\ProducerFilter;

class MoviesController extends AbstractController
{
    public function getMinBudget()
    {
        $sql = <<<SQL
         select MIN(budget)
         from movies
        SQL;
        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_NUM);
        return $result ? $result[0] : null;
    }
    public function getMaxBudget()
    {
        $sql = <<<SQL
         select MAX(budget)
         from movies
        SQL;
        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(\PDO::FETCH_NUM);
        return $result ? $result[0] : null;

    }
    public function getCurrentMaxBudget()
    {

    }
    public function execute()
    {
        $this->renderHtml('movies.phtml');
    }

    /**
     * @return array
     */
    public function getProducers(): array
    {
        $db = \App\Models\Db::getDbh()->prepare('SELECT * FROM producers');
        $db->execute();
        return $db->fetchAll();
    }

//    public function findAllMovies(int $producerId = 0)
//    {
//        $sql = <<<SQL
//        select *
//        from movies
//            join producers as p on  p.producer_id = movies.movies_id
//        SQL;
//
//        if ($producerId) {
//            $sql .= 'where p.producer_id = :producerId;';
//        }
//
//        $dbh = Db::getDbh();
//        $stmt = $dbh->prepare($sql);
//        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);
//
//        $stmt->execute();
//        return $stmt->fetchAll(\PDO::FETCH_CLASS, \App\Models\ProducerFilter::class);
//    }
}