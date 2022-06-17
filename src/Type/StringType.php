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

namespace XDM\ValueObject\Type;

use XDM\ValueObject\ValueObject;

class StringType extends ValueObject
{
    protected ?string $value;

    public function __construct(?string $value = null)
    {
        $this->setValue($value);
    }
}
