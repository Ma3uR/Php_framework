<?php

declare(strict_types=1);

namespace App\Controller;

use App\View\Movies;
use App\Models\Db;
use App\View\Renderer;
use App\Models\ProducerFilter;

class MoviesListController extends AbstractController
{
    public function execute()
    {
//        $currentMinBudget = $this->getCurrentMinBudget();
//        $sql = <<<SQL
//        select *
//        from movies
//            join producers as p on  p.producer_id = movies.producer_id
//            WHERE m.budget >= :current_min_budget AND m.budget <=
//        SQL;
        $minBudet = $_POST['min'];
        $maxBudet = $_POST['max'];
        $sql = <<<SQL
        SELECT *
        FROM movies
            INNER JOIN producers AS p ON p.producer_id = movies.producer_id
        SQL;

        if ($producerId = $this->getProducerId()) {
            $sql .= ' WHERE p.producer_id = :producerId;';
        }
        if ($minBudet && $maxBudet) {
            $sql .= ' AND budget>= :minBudet  AND budget<= :maxBudget;';
        }


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);
        $stmt->bindValue(':minBudet', $minBudet, \PDO::PARAM_INT);
        $stmt->bindValue(':maxBudet', $maxBudet, \PDO::PARAM_INT);
        $stmt->execute();
        $movies = $stmt->fetchAll();
        header('Content-Type: application/json');
        echo json_encode($movies);
    }

    /**
     * @return int
     */
    public function getProducerId(): int
    {
        return isset($_REQUEST['producer_id'])
            ? (int) $_REQUEST['producer_id']
            : 0;
    }
}