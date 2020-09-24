<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Services\Listing;

use BiegalskiLLC\NHTSAVehicleAPI\Services\Service;
use BiegalskiLLC\NHTSAVehicleAPI\Traits\DataSortTrait;
use BiegalskiLLC\NHTSAVehicleAPI\Traits\HttpRequestTrait;

/**
 * Class Models
 * @package BiegalskiLLC\NHTSAVehicleAPI\Services\Listing
 */
class Models extends Service
{
    use DataSortTrait, HttpRequestTrait;

    /**
     * Models constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param int $makeId
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listModelsByMake(int $makeId)
    {
        $response = $this->httpRequest(

            $this->swapUrlVariables(
                $this->config['list']['models_by_make_id'],
                [
                    ':MAKEID' => $makeId
                ]
            )

        );

        if( isset($response['Results']) ){
            return $this->sortDataByColumn($response['Results'], 'Model_Name');
        }

        return $response;
    }

    /**
     * @param int $makeId
     * @param int $year
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listModelsByMakeYear(int $makeId, int $year)
    {
        $response = $this->httpRequest(

            $this->swapUrlVariables(
                $this->config['list']['models_by_make_id_year'],
                [
                    ':MAKEID' => $makeId,
                    ':YEAR' => $year
                ]
            )

        );

        if( isset($response['Results']) ){
            return $this->sortDataByColumn($response['Results'], 'Model_Name');
        }

        return $response;
    }
}
