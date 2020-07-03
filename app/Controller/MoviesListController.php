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
        $sql = <<<SQL
        SELECT *
        FROM movies
            INNER JOIN producers AS p ON p.producer_id = movies.producer_id  
        SQL;

        $where = [];
        $params = [];

        if ($producerId = $this->getProducerId()) {
            $where[] = 'WHERE p.producer_id = :producerId';
            $params[':producerId'] = $producerId;
        }
        if ($minBudget = $this->getMinValue()) {
            $where[] = 'WHERE budget >= :min_budget';
            $params[':min_budget'] = $minBudget;
        }
        if ($maxBudget = $this->getMaxValue()) {
            $where[] = 'budget <= :max_budget';
            $params[':max_budget'] = $maxBudget;
        }

        if (count($where)) {
            $sql .= implode(' AND ', $where);
        };


        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->execute($params);

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

    public function getMinValue(): int
    {
        return isset($_REQUEST['min'])
            ? (int) $_REQUEST['min']
            : 0;
    }

    public function getMaxValue(): int
    {
        return isset($_REQUEST['max'])
            ? (int) $_REQUEST['max']
            : 0;
    }
}