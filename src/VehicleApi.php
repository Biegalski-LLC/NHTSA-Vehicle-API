<?php

namespace BiegalskiLLC\NHTSAVehicleAPI;

use BiegalskiLLC\NHTSAVehicleAPI\Services\Decode\Vin;
use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Makes;
use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Models;
use BiegalskiLLC\NHTSAVehicleAPI\Services\Listing\Years;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class VehicleApi
 * @package BiegalskiLLC\NHTSAVehicleAPI
 */
class VehicleApi
{
    /**
     * @var Makes
     */
    public $makes;

    /**
     * @var Models
     */
    public $models;

    /**
     * @var Years
     */
    public $years;

    /**
     * @var Vin
     */
    public $vin;

    /**
     * VehicleApi constructor.
     */
    public function __construct()
    {
        $this->makes = new Makes();
        $this->models = new Models();
        $this->years = new Years();
        $this->vin = new Vin();
    }

    /**
     * @param string $vin
     * @return mixed|string
     * @throws GuzzleException
     */
    public function decodeVin(string $vin)
    {
        return $this->vin->decodeVin($vin);
    }

    /**
     * @param int $earliestYear
     * @return array
     */
    public function listYears(int $earliestYear = 1990): array
    {
        return $this->years->listYears($earliestYear);
    }

    /**
     * @return mixed|string
     * @throws GuzzleException
     */
    public function listAllMakes()
    {
        return $this->makes->listAllMakes();
    }

    /**
     * @param string|null $vehicleTypeName
     * @return array
     */
    public function listPreloadedMakes(string $vehicleTypeName = null): array
    {
        return $this->makes->listPreloadedMakes($vehicleTypeName);
    }

    /**
     * @param array $acceptedList
     * @return array|mixed|string
     * @throws GuzzleException
     */
    public function listAcceptedListMakes(array $acceptedList)
    {
        return $this->makes->listAcceptedListMakes($acceptedList);
    }

    /**
     * @param int $makeId
     * @return mixed|string
     * @throws GuzzleException
     */
    public function listModelsByMake(int $makeId)
    {
        return $this->models->listModelsByMake($makeId);
    }

    /**
     * @param int $makeId
     * @param int $year
     * @return mixed|string
     * @throws GuzzleException
     */
    public function listModelsByMakeYear(int $makeId, int $year)
    {
        return $this->models->listModelsByMakeYear($makeId, $year);
    }

    /**
     * @param int $makeId
     * @return string
     */
    public function getMakeNameFromMakeId(int $makeId): mixed
    {

        foreach ($this->listPreloadedMakes() as $make) {
            if ($make['make_id'] == $makeId) return $make['make_name'];
        }
        return null;
    }


    /**
     * @param int $makeId
     * @param int $modelId
     * @return string
     */
    public function getModelNameFromMakeModelId(int $makeId, int $modelId): mixed
    {
        foreach ($this->listModelsByMake($makeId) as $model) {
            if ($model['Model_ID'] == $modelId) return $model['Model_Name'];
        }
        return null;
    }
}
