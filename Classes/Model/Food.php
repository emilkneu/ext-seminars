<?php

declare(strict_types=1);

namespace OliverKlee\Seminars\Model;

use OliverKlee\Oelib\Model\AbstractModel;

/**
 * This class represents a food option.
 */
class Food extends AbstractModel
{
    /**
     * @return string our title, will not be empty
     */
    public function getTitle(): string
    {
        return $this->getAsString('title');
    }
}
