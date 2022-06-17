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

namespace XDM\ValueObject\Constraint;

use XDM\ValueObject\Constraint;

class NotEmpty implements Constraint
{
    public function __invoke($value): bool
    {
        return !empty(trim($value));
    }
}
