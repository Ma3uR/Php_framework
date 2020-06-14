<?php

namespace App\Services;
use App\Models\ProducerFilter;
use App\Models\Db;

class ProducerFilterService
{
    public function findAllMovies(int $producerId = 0) {
        $sql = <<<SQL
        select *
        from movies
            join producers as p on  p.producer_id = movies.movies_id
        SQL;

        if ($producerId) {
            $sql .= ' where p.producer_id = :producerId;';
        }

        $dbh = Db::getDbh();
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':producerId', $producerId, \PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, \App\Models\ProducerFilter::class);
    }
}