<?php

namespace Crossword\Generate\BaseLine;

/**
 * Crossword based on one word vertically
 */
class Column extends BaseLine
{

    protected function getCenterLine()
    {
        return $this->getCenterCol();
    }

    protected function getBaseLine()
    {
        return $this->firstWord->getRows()->getRandom();
    }

}