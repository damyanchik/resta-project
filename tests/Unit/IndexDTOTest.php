<?php

namespace Tests\Unit;

use App\DTOs\IndexDTO;
use PHPUnit\Framework\TestCase;

class IndexDTOTest extends TestCase
{
    public static function indexDTODataProvider(): array
    {
        return [
            [
                'data' => ['search' => 'example', 'column' => 'name', 'order' => 'asc', 'display' => 10],
                'expectedSearch' => 'example',
                'expectedColumn' => 'name',
                'expectedOrder' => 'asc',
                'expectedDisplay' => 10,
            ],
            [
                'data' => [],
                'expectedSearch' => '',
                'expectedColumn' => '',
                'expectedOrder' => '',
                'expectedDisplay' => 0,
            ],
            [
                'data' => ['search' => 'example', 'column' => null, 'order' => 'asc', 'display' => 20],
                'expectedSearch' => 'example',
                'expectedColumn' => '',
                'expectedOrder' => 'asc',
                'expectedDisplay' => 20,
            ],
            [
                'data' => ['search' => 'example', 'order' => 'asc'],
                'expectedSearch' => 'example',
                'expectedColumn' => '',
                'expectedOrder' => 'asc',
                'expectedDisplay' => 0,
            ],
            [
                'data' => ['search' => 'example', 'column' => 123, 'order' => null, 'display' => '20'],
                'expectedSearch' => 'example',
                'expectedColumn' => '123',
                'expectedOrder' => '',
                'expectedDisplay' => 20,
            ],
        ];
    }

    /**
     * @dataProvider indexDTODataProvider
     */
    public function testCreateIndexDTO(
        array $data, string $expectedSearch, string $expectedColumn, string $expectedOrder, int $expectedDisplay
    ): void
    {
        $indexDTO = new IndexDTO($data);

        $this->assertEquals($expectedSearch, $indexDTO->getSearch());
        $this->assertEquals($expectedColumn, $indexDTO->getColumn());
        $this->assertEquals($expectedOrder, $indexDTO->getOrder());
        $this->assertEquals($expectedDisplay, $indexDTO->getDisplay());
    }
}
