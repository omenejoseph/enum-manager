
```php
<?php

namespace OmeneJoseph\EnumManager\Tests;

use OmeneJoseph\EnumManager\EnumManager;

class ExampleEnum
{
    const ONE = 'one';
    const TWO = 'two';
    const THREE = 'three';
}

it('returns enum values as a string', function () {
    $manager = new EnumManager();
    $values = $manager->enumValues(ExampleEnum::class);

    expect($values)->toEqual('one,two,three');
});

it('returns enum keys as a string', function () {
    $manager = new EnumManager();
    $keys = $manager->enumKeys(ExampleEnum::class);

    expect($keys)->toEqual('ONE,TWO,THREE');
});

it('returns enum values as an array', function () {
    $manager = new EnumManager();
    $values = $manager->enumValuesArray(ExampleEnum::class);

    expect($values)->toEqual(['one', 'two', 'three']);
});

it('returns enum keys as an array', function () {
    $manager = new EnumManager();
    $keys = $manager->enumKeysArray(ExampleEnum::class);

    expect($keys)->toEqual(['ONE', 'TWO', 'THREE']);
});
```
