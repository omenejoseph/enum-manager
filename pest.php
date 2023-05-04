
```php
<?php

namespace OmeneJoseph\EnumManager\Tests;

use Pest\Plugin;
use PHPUnit\Framework\TestSuite;

Plugin::uses('OmeneJoseph\\EnumManager\\Tests');

function it($description, callable $test): TestSuite
{
    return test($description, $test)
        ->uses('OmeneJoseph\\EnumManager\\Tests');
}
```