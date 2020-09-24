<?php

declare(strict_types=1);

use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Models;
use PHPUnit\Framework\TestCase;


final class ModelsTest extends TestCase
{
    /**
     * @var Models
     */
    protected $modelsServiceClass;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->modelsServiceClass = new Models();
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testListModelsByMakeIsArray(): void
    {
        self::assertIsArray(
            $this->modelsServiceClass->listModelsByMake(460)
        );
    }

    /**
     *
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function testListModelsByMakeYearIsArray(): void
    {
        self::assertIsArray(
            $this->modelsServiceClass->listModelsByMakeYear(460, 2020)
        );
    }

}
