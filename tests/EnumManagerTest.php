
<?php

namespace OmeneJoseph\EnumManager\Test;

use OmeneJoseph\EnumManager\EnumManager;
use OmeneJoseph\EnumManager\Contracts\EnumManagerInterface;
use OmeneJoseph\EnumManager\Test\Fixtures\TestEnum;
use PHPUnit\Framework\TestCase;

class EnumManagerTest extends TestCase
{
    private EnumManagerInterface $enumManager;

    protected function setUp(): void
    {
        parent::setUp();
        $this->enumManager = new EnumManager();
    }

    /** @test */
    public function it_returns_enum_values_as_a_string()
    {
        $result = $this->enumManager->enumValues(TestEnum::class);

        $this->assertSame('John,Doe,25', $result);
    }

    /** @test */
    public function it_returns_enum_keys_as_a_string()
    {
        $result = $this->enumManager->enumKeys(TestEnum::class);

        $this->assertSame('FIRST_NAME,LAST_NAME,AGE', $result);
    }

    /** @test */
    public function it_returns_enum_values_as_an_array()
    {
        $result = $this->enumManager->enumValuesArray(TestEnum::class);

        $this->assertSame(['John', 'Doe', 25], $result);
    }

    /** @test */
    public function it_returns_enum_keys_as_an_array()
    {
        $result = $this->enumManager->enumKeysArray(TestEnum::class);

        $this->assertSame(['FIRST_NAME', 'LAST_NAME', 'AGE'], $result);
    }
}

