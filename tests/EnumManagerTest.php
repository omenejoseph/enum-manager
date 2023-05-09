
<?php

namespace OmeneJoseph\EnumManager\Tests;

use OmeneJoseph\EnumManager\EnumManager;
use PHPUnit\Framework\TestCase;

class EnumManagerTest extends TestCase
{
    private $enumManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->enumManager = new EnumManager();
    }

    public function testEnumValues()
    {
        $values = $this->enumManager->enumValues(SampleEnum::class);
        $this->assertEquals('male,female', $values);
    }

    public function testEnumKeys()
    {
        $keys = $this->enumManager->enumKeys(SampleEnum::class);
        $this->assertEquals('GENDER_MALE,GENDER_FEMALE', $keys);
    }

    public function testEnumValuesArray()
    {
        $valuesArray = $this->enumManager->enumValuesArray(SampleEnum::class);
        $this->assertEquals(['male', 'female'], $valuesArray);
    }

    public function testEnumKeysArray()
    {
        $keysArray = $this->enumManager->enumKeysArray(SampleEnum::class);
        $this->assertEquals(['GENDER_MALE', 'GENDER_FEMALE'], $keysArray);
    }
}

