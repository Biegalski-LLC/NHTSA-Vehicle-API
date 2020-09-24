<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Traits;

/**
 * Trait DataSortTrait
 * @package BiegalskiLLC\NHTSAVehicleAPI\Traits
 */
trait DataSortTrait
{
    /**
     * @param $data
     * @param string $column
     * @return mixed
     */
    public function sortDataByColumn($data, string $column)
    {
        usort($data, function($a, $b) use ($column) {
            return $a[$column] <=> $b[$column];
        });

        return $data;
    }
}
