# Value objects for PHP

Easy way for validate, normalize and format values.

## Installation

Install the latest version with:

```bash
$ composer require xdevmafia/php-value-object
```

## Basic Usage

```php
use XDM\ValueObject\Object\EmailObject;
use XDM\ValueObject\Type\StringType;

class User
{
    private StringType $username;
    private EmailObject $email;
    
    public function __construct(StringType $username, EmailObject $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function getUsername(): StringType
    {
        return $this->username;
    }

    public function setUsername(StringType $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): EmailObject
    {
        return $this->email;
    }

    public function setEmail(EmailObject $email): void
    {
        $this->email = $email;
    }
}
```

```php
try {
    $username = new StringType('xdevmafia');
    $email = new EmailObject('info@xdevmafia.org');
} catch (ConstraintException $e) {
    throw $e;
}

$user = new User($username, $email);
```

## Types

List of available **Type** classes:

- IntType
- FloatType
- StringType
- BoolType
- ArrayType
- ObjectType
- MixedType

## Constraints

List of available **Constraint** classes:

- DateFormat
- Domain
- Email
- Enum
- Ip
- IsObject
- Json
- Max
- MaxLength
- Min
- MinLength
- NotEmpty
- NotNull
- Regex
- Url
- Uuid

## Objects

List of available **Object** classes:

- DateObject
- DateTimeObject
- DomainObject
- EmailObject
- IpObject
- JsonObject
- UrlObject
- UuidObject

Object extends ***Type** class:

```php
use XDM\ValueObject\Constraint\Email;
use XDM\ValueObject\Type\StringType;

class EmailObject extends StringType
{
    protected function setConstraints(): void
    {
        $this->addConstraint(new Email());
    }
}
```

You can create own objects:

```php
namespace App\ValueObject;

use XDM\ValueObject\Type\StringType;

class DeliveryAddressObject extends StringType
{
}
```

With constraints:

```php
use XDM\ValueObject\Constraint\Regex;
use XDM\ValueObject\Type\StringType;

class UsernameObject extends StringType
{
    protected function setConstraints(): void
    {
        $this->addConstraint(new Regex('[a-z]{3,10}'));
    }
}
```

You can create own constraints.

Invokable class will be return `bool` value:

```php
namespace App\Constraint;

use XDM\ValueObject\Constraint;

class HexColor implements Constraint
{
    public function __invoke($value): bool
    {
        return ctype_xdigit($value);
    }
}
```

And object that uses this constraint:

```php
namespace App\ValueObject;

use App\Constraint\HexColor;
use XDM\ValueObject\Type\StringType;

class ColorObject extends StringType
{
    protected function setConstraints(): void
    {
        $this->addConstraint(new HexColor());
    }
}
```