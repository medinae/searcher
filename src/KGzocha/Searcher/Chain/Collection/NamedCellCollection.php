<?php

namespace KGzocha\Searcher\Chain\Collection;

use KGzocha\Searcher\Chain\CellInterface;
use KGzocha\Searcher\Criteria\Collection\NamedCellCollectionInterface;

/**
 * @author AbdElKader Bouadjadja <ak.bouadjadja@gmail.com>
 */
class NamedCriteriaCollection extends CellCollection implements NamedCellCollectionInterface
{
    /**
     * @param string $name
     *
     * @return null|CellInterface
     */
    public function __get($name)
    {
        return $this->getNamedCell($name);
    }

    /**
     * @param string            $name
     * @param CellInterface     $value
     */
    public function __set($name, CellInterface $value)
    {
        $this->addNamedCell($name, $value);
    }

    /**
     * @param string            $name
     * @param CellInterface     $cell
     *
     * @return $this
     */
    public function addNamedCell($name, CellInterface $cell)
    {
        $this->cells[$name] = $cell;

        return $this;
    }

    /**
     * @param string $name
     *
     * @return null|CellInterface
     */
    public function getNamedCell($name)
    {
        return array_key_exists($name, $this->cells) ? $this->cells[$name] : null;
    }
}
