<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Services\Listing;

use BiegalskiLLC\NHTSAVehicleAPI\Services\Service;
use BiegalskiLLC\NHTSAVehicleAPI\Traits\DataSortTrait;
use BiegalskiLLC\NHTSAVehicleAPI\Traits\HttpRequestTrait;

/**
 * Class Makes
 * @package BiegalskiLLC\NHTSAVehicleAPI\Services\Listing
 */
class Makes extends Service
{
    use DataSortTrait, HttpRequestTrait;

    /**
     * @var array
     */
    private $acceptedMakes = [];

    /**
     * ListYears constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listAllMakes()
    {
        $response = $this->httpRequest(
            $this->config['list']['makes']
        );

        if( isset($response['Results']) ){
            return $this->sortDataByColumn($response['Results'], 'Make_Name');
        }

        return $response;
    }

    /**
     * @desc Pre-loaded makes list of common makes
     *
     * @return array
     */
    public function listPreloadedMakes(): array
    {
        return include( __DIR__ . '/../../../config/preloadedList.php');
    }

    /**
     * @param array $acceptedList
     * @return array|mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function listAcceptedListMakes(array $acceptedList)
    {
        $response = $this->httpRequest(
            $this->config['list']['makes']
        );

        if( isset($response['Results']) ){

            $makes = $this->sortDataByColumn($response['Results'], 'Make_Name');

            $this->filterResults($makes, $acceptedList);

            return $this->acceptedMakes;

        }

        return $response;
    }

    /**
     * @param array $makes
     * @param array $acceptedList
     */
    private function filterResults(array $makes, array $acceptedList): void
    {
        foreach ($makes as $make){

            if( in_array($make['Make_ID'], $acceptedList, true) ){

                $this->acceptedMakes[] = [
                    'make_id' => $make['Make_ID'],
                    'make_name' => ucwords(strtolower($make['Make_Name']))
                ];
            }

        }
    }

}
