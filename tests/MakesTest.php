<?php

declare(strict_types=1);

use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Makes;
use PHPUnit\Framework\TestCase;

/**
 * Class MakesTest
 */
final class MakesTest extends TestCase
{
    /**
     * @var Makes
     */
    protected $makesServiceClass;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->makesServiceClass = new Makes();
    }

    /**
     *
     */
    public function testListAllMakesIsArray(): void
    {
        self::assertIsArray(
            $this->makesServiceClass->listAllMakes()
        );
    }

    /**
     *
     */
    public function testListPreloadedMakesIsArray(): void
    {
        self::assertIsArray(
            $this->makesServiceClass->listPreloadedMakes()
        );
    }

    /**
     *
     */
    public function testListAcceptedMakesIsArray(): void
    {
        self::assertIsArray(
            $this->makesServiceClass->listAcceptedListMakes([6124,9172])
        );
    }

}
