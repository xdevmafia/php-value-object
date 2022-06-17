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

namespace XDM\ValueObject;

/**
 * @property mixed $value
 */
abstract class ValueObject
{
    private array $constraints = [];

    public function addConstraint(Constraint $constraint): void
    {
        $this->constraints[] = $constraint;
    }

    public function getConstraints(): array
    {
        if (is_callable([$this, 'setConstraints'])) {
            $this->setConstraints();
        }

        return $this->constraints;
    }

    public function setValue($value): void
    {
        $values = is_array($value) ? $value : [$value];

        foreach ($this->getConstraints() as $constraint) {
            array_map(static function ($value) use ($constraint) {
                if (!$constraint($value)) {
                    throw new ConstraintException(
                        get_class($constraint)
                    );
                }
            }, $values);
        }

        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getNormalizeValue()
    {
        if (is_callable([$this, 'normalizeValue'])) {
            return $this->normalizeValue();
        }

        return $this->getValue();
    }

    public function getFormatValue()
    {
        if (is_callable([$this, 'formatValue'])) {
            return $this->formatValue();
        }

        return $this->getValue();
    }

    public function __toString()
    {
        $value = $this->getFormatValue();

        if (is_array($value)) {
            $value = implode(',', $value);
        }

        return (string) $value;
    }
}
