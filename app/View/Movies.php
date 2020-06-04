<?php

namespace App\View;

use App\Services\ProducerFilterService;
use App\View\AbstractBlock;
use App\View\ViewInterface;

class Movies extends AbstractBlock implements ViewInterface
{
    private $producerId;

    public function setProducerFilter(int $getId)
    {

    }

    protected function getVars(): array
    {
        $producerId = $this->producerId ?? (int) $_GET['id'];
        $ProducerFilterService = new ProducerFilterService();

        return [
            'ProducerFilterService' => $ProducerFilterService->findAllMovies($producerId)
        ];
    }
}