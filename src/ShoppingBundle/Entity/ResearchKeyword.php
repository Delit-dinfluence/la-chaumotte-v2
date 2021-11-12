<?php

namespace Shopping\Entity;

use Core\Entity\Traits\EntityTrait;
use Core\Entity\Traits\TranslatableTrait;
use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration principale de l'application
 *
 * @ORM\Entity(repositoryClass="Shopping\Repository\ResearchKeywordRepository")
 * @ORM\Table(name="shopping_research_keyword")
 */
class ResearchKeyword
{
    use TranslatableTrait;
    use EntityTrait {
        EntityTrait::__construct as private __entityConstruct;
    }

    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $this->__entityConstruct();

        $this->setIsEnabled(true);
    }


}
