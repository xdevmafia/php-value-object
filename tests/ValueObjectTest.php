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

use PHPUnit\Framework\TestCase;
use XDM\ValueObject\Type\StringType;

class ValueObjectTest extends TestCase
{
    public function testValue(): void
    {
        $value = 'value';
        $valueObject = new StringType($value);

        $this->assertEquals($value, $valueObject->getValue());
    }
}