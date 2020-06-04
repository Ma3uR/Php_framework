<?php

namespace App\View;

abstract class AbstractBlock
{
    /**
     * @return string
     * @throws \ReflectionException
     */
    public function render(): string
    {
        $templateName = strtolower((new \ReflectionClass($this))->getShortName());

        extract($this->getVars());
        ob_start();
        include "templates/$templateName.phtml";
        return ob_get_clean();
    }

    /**
     * @param string $blockClass
     * @return AbstractBlock
     */
    public function getBlock(string $blockClass)
    {
        /** @var AbstractBlock $block */
        $block = new $blockClass;
        return $block;
    }

    /**
     * @return array
     */
    abstract protected function getVars(): array;
}