<?php

namespace Krlove\CodeGenerator\Model;

use Krlove\CodeGenerator\Exception\ValidationException;
use Krlove\CodeGenerator\Model\Traits\AbstractModifierTrait;
use Krlove\CodeGenerator\Model\Traits\FinalModifierTrait;
use Krlove\CodeGenerator\RenderableModel;

/**
 * Class Name
 * @package Krlove\CodeGenerator\Model
 */
class TraitNameModel extends ClassNameModel
{
    /**
     * {@inheritDoc}
     */
    public function toLines()
    {
        $lines = [];

        $name = '';
        if ($this->final) {
            $name .= 'final ';
        }
        if ($this->abstract) {
            $name .= 'abstract ';
        }
        $name .= 'trait ' . $this->name;

        if ($this->extends !== null) {
            $name .= sprintf(' extends %s', $this->extends);
        }
        if (count($this->implements) > 0) {
            $name .= sprintf(' implements %s', implode(', ', $this->implements));
        }

        $lines[] = $name;
        $lines[] = '{';

        return $lines;
    }

}
