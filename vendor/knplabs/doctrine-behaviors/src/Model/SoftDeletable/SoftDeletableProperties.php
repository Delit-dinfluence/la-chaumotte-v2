<?php

/*
 * This file is part of the KnpDoctrineBehaviors package.
 *
 * (c) KnpLabs <http://knplabs.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Knp\DoctrineBehaviors\Model\SoftDeletable;

/**
 * SoftDeletable trait.
 *
 * Should be used inside entity, that needs to be self-deleted.
 */
trait SoftDeletableProperties
{
    protected $deletedAt;
}
