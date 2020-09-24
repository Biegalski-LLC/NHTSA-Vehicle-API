<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Services\Listing;

use BiegalskiLLC\NHTSAVehicleAPI\Services\Service;
use Carbon\Carbon;

/**
 * Class ListYears
 */
class Years extends Service
{
    /**
     * ListYears constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $earliestYear
     * @return array
     */
    public function listYears(int $earliestYear = 1990): array
    {
        $earliestYear = $this->limitEarliestYear($earliestYear);

        $years = [];

        for ($i = $earliestYear; $i <= Carbon::now()->addYears(2)->format('Y'); $i++){
            $years[] = $i;
        }

        rsort($years);

        return $years;
    }

    /**
     * @param int $earliestYear
     * @return int
     */
    public function limitEarliestYear(int $earliestYear): int
    {
        if( $earliestYear <= 1960 ){
            return 1960;
        }

        if( $earliestYear > Carbon::now()->addYears(2)->format('Y') ){
            return (int)Carbon::now()->addYears(2)->format('Y');
        }

        return $earliestYear;
    }
}
