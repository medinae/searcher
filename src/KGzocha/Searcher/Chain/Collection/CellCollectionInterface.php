<?php

namespace KGzocha\Searcher\Chain\Collection;

use KGzocha\Searcher\Chain\CellInterface;

/**
 * @author AbdElKader Bouadjadja <ak.bouadjadja@gmail.com>
 */
interface CellCollectionInterface extends \Countable, \IteratorAggregate
{
    /**
     * @return CellInterface[]
     */
    public function getCells();

    /**
     * @param CellInterface $cell
     *
     * @return CellCollectionInterface
     */
    public function addCell(CellInterface $cell);
}
