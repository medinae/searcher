<?php

namespace KGzocha\Searcher\Criteria\Collection;

use KGzocha\Searcher\Chain\CellInterface;
use KGzocha\Searcher\Chain\Collection\CellCollectionInterface;

/**
 * Acts like regular CellCollection, but has possibility to specify key under which
 * given Cell will be stored. Use it when you want to ensure unique models or to ease hydration.
 *
 * @author AbdElKader Bouadjadja <ak.bouadjadja@gmail.com>
 */
interface NamedCellCollectionInterface extends CellCollectionInterface
{
    /**
     * @param string            $name
     * @param CellInterface     $cell
     *
     * @return $this
     */
    public function addNamedCell($name, CellInterface $cell);

    /**
     * @param string $name
     *
     * @return null|CellInterface
     */
    public function getNamedCell($name);
}
