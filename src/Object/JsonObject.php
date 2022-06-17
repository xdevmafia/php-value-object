<?php

declare(strict_types=1);

/*
 * This file is part of the php-value-object package.
 *
 * (c) xDevMafia <https://xdevmafia.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace XDM\ValueObject\Object;

use XDM\ValueObject\Constraint\Json;
use XDM\ValueObject\Type\StringType;

class JsonObject extends StringType
{
    protected function setConstraints(): void
    {
        $this->addConstraint(new Json());
    }
}
