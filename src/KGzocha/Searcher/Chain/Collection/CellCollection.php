<?php

namespace KGzocha\Searcher\Chain\Collection;

use KGzocha\Searcher\Chain\CellInterface;

/**
 * @author AbdElKader Bouadjadja <ak.bouadjadja@gmail.com>
 */
class CellCollection implements CellCollectionInterface
{
    const MINIMUM_CELLS = 2;

    /**
     * @var CellInterface[]
     */
    protected $cells;

    /**
     * CellCollection constructor.
     *
     * @param CellInterface[] $providedCells
     */
    public function __construct($providedCells = [])
    {
        $this->cells = [];

        $this->validateCells($providedCells);
        foreach ($providedCells as $cell) {
            $this->addCell($cell);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * {@inheritdoc}
     */
    public function addCell(CellInterface $cell)
    {
        $this->cells[] = $cell;
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->cells);
    }

    /**
     * @inheritDoc
     */
    public function count()
    {
        return count($this->cells);
    }

    /**
     * @param CellInterface[] $cells
     * @throws \InvalidArgumentException
     */
    private function validateCells(array $cells)
    {
        if (self::MINIMUM_CELLS > count($cells)) {
            throw new \InvalidArgumentException(
                'At least two searchers are required to create a chain'
            );
        }

        foreach ($cells as $cell) {
            if (is_object($cell) && $cell instanceof CellInterface) {
                continue;
            }

            throw new \InvalidArgumentException(sprintf(
                'All cells passed to %s should be object and must implement CellInterface',
                __CLASS__
            ));
        }
    }
}