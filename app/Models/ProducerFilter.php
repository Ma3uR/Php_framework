<?php
declare(strict_types=1);

namespace App\Models;

class ProducerFilter
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var string $producer
     */
    private $producer;
    /**
     * @var string $relese
     */
    private $relese;
    /**
     * @var int $budget
     */
    private $budget;
    /**
     * @var int $box_office
     */
    private $box_office;
    /**
     * @var int $running_time
     */
    private $running_time;
    /**
     * @var string $genre
     */
    private $genre;
    /**
     * @var int $studio_id
     */
    private $studio_id;

//    private $data = [];
//
//    public function __call($name, $arguments)
//    {
//        // setId() > $this->data['id'] = $arguments[0]
//
//        // getId() > $this->data['id']
//    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * @param mixed $producer
     */
    public function setProducer($producer): void
    {
        $this->producer = $producer;
    }

    /**
     * @return mixed
     */
    public function getRelese()
    {
        return $this->relese;
    }

    /**
     * @param mixed $relese
     */
    public function setRelese($relese): void
    {
        $this->relese = $relese;
    }

    /**
     * @return mixed
     */
    public function getBudget()
    {
        return $this->budget;
    }

    /**
     * @param mixed $budget
     */
    public function setBudget($budget): void
    {
        $this->budget = $budget;
    }

    /**
     * @return mixed
     */
    public function getBoxOffice()
    {
        return $this->box_office;
    }

    /**
     * @param mixed $box_office
     */
    public function setBoxOffice($box_office): void
    {
        $this->box_office = $box_office;
    }

    /**
     * @return mixed
     */
    public function getRunningTime()
    {
        return $this->running_time;
    }

    /**
     * @param mixed $running_time
     */
    public function setRunningTime($running_time): void
    {
        $this->running_time = $running_time;
    }

    /**
     * @return mixed
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param mixed $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

    /**
     * @return mixed
     */
    public function getStudioId()
    {
        return $this->studio_id;
    }

    /**
     * @param mixed $studio_id
     */
    public function setStudioId($studio_id): void
    {
        $this->studio_id = $studio_id;
    }
}