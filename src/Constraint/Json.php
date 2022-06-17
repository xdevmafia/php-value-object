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

use JsonException;
use XDM\ValueObject\Constraint;

class Json implements Constraint
{
    public function __invoke($value): bool
    {
        try {
            json_decode($value, false, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            return false;
        }

        return true;
    }
}
