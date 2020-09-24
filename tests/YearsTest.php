<?php

declare(strict_types=1);

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Years;

/**
 * Class YearsTest
 */
final class YearsTest extends TestCase
{
    /**
     * @var Years
     */
    protected $yearsServiceClass;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->yearsServiceClass = new Years();
    }

    /**
     *
     */
    public function testEarliestYearMinimum(): void
    {
        self::assertEquals(
            $this->yearsServiceClass->limitEarliestYear(1920),
            1960
        );
    }

    /**
     *
     */
    public function testEarliestYearMaximum(): void
    {
        self::assertEquals(
            $this->yearsServiceClass->limitEarliestYear(
                (int) Carbon::now()->addYears(30)->format('Y')
            ),
            (int) Carbon::now()->addYears(2)->format('Y')
        );
    }

    /**
     *
     */
    public function testYearsListIsArray(): void
    {
        self::assertIsArray(
            $this->yearsServiceClass->listYears(1990)
        );
    }
}
