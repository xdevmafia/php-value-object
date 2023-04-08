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

use DateTime;
use XDM\ValueObject\Constraint;

class DateFormat implements Constraint
{
    private string $format;

    public function __construct(string $format)
    {
        $this->format = $format;
    }

    public function __invoke($value): bool
    {
        if ($value === null) {
            return true;
        }

        return DateTime::createFromFormat($this->format, $value) !== false;
    }
}
