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

class Regex implements Constraint
{
    private string $regex;

    public function __construct(string $regex)
    {
        $this->regex = $regex;
    }

    public function __invoke($value): bool
    {
        if ($value === null) {
            return true;
        }

        return preg_match($this->regex, $value) > 0;
    }
}
