<?php

namespace App\View;

interface ViewInterface
{
    /**
     * @return string
     */
    public function render(): string;
}