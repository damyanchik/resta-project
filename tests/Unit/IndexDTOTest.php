<?php

namespace Tests\Unit;

use App\DTOs\IndexDTO;
use PHPUnit\Framework\TestCase;

class IndexDTOTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function testCreateIndexDTO(): void
    {
        $data = [
            'search' => 'example',
            'column' => 'name',
            'order' => 'asc',
            'display' => 10,
        ];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('example', $indexDTO->getSearch());
        $this->assertEquals('name', $indexDTO->getColumn());
        $this->assertEquals('asc', $indexDTO->getOrder());
        $this->assertEquals(10, $indexDTO->getDisplay());
    }

    public function testCreateIndexDTOWithNullValues()
    {
        $data = [];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('', $indexDTO->getSearch());
        $this->assertEquals('', $indexDTO->getColumn());
        $this->assertEquals('', $indexDTO->getOrder());
        $this->assertEquals(0, $indexDTO->getDisplay());
    }

    public function testCreateIndexDTOWithMixedValues()
    {
        $data = [
            'search' => 'example',
            'column' => null,
            'order' => 'asc',
            'display' => 20,
        ];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('example', $indexDTO->getSearch());
        $this->assertEquals('', $indexDTO->getColumn());
        $this->assertEquals('asc', $indexDTO->getOrder());
        $this->assertEquals(20, $indexDTO->getDisplay());
    }

    public function testCreateIndexDTOWithEmptyArray()
    {
        $data = [];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('', $indexDTO->getSearch());
        $this->assertEquals('', $indexDTO->getColumn());
        $this->assertEquals('', $indexDTO->getOrder());
        $this->assertEquals(0, $indexDTO->getDisplay());
    }

    public function testCreateIndexDTOWithoutKeyInArray()
    {
        $data = [
            'search' => 'example',
            'order' => 'asc',
        ];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('example', $indexDTO->getSearch());
        $this->assertEquals('', $indexDTO->getColumn());
        $this->assertEquals('asc', $indexDTO->getOrder());
        $this->assertEquals(0, $indexDTO->getDisplay());
    }

    public function testCreateIndexDTOWithDifferentDataTypes()
    {
        $data = [
            'search' => 'example',
            'column' => 123,
            'order' => null,
            'display' => '20',
        ];

        $indexDTO = new IndexDTO($data);

        $this->assertEquals('example', $indexDTO->getSearch());
        $this->assertEquals('123', $indexDTO->getColumn());
        $this->assertEquals('', $indexDTO->getOrder());
        $this->assertEquals(20, $indexDTO->getDisplay());
    }
}
