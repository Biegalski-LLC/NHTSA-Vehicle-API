<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Services\Decode;

use BiegalskiLLC\NHTSAVehicleAPI\Services\Service;
use BiegalskiLLC\NHTSAVehicleAPI\Traits\HttpRequestTrait;

/**
 * Class Vin
 * @package BiegalskiLLC\NHTSAVehicleAPI\Services\Decode
 */
class Vin extends Service
{
    use HttpRequestTrait;

    /**
     * ListYears constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param string $vin
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function decodeVin(string $vin)
    {
        $response = $this->httpRequest(
            $this->swapUrlVariables(
                $this->config['decode']['vin'] . '?format=json',
                [
                    ':VIN' => $vin
                ]
            )
        );

        if( isset($response['Results']) ){
            return $response['Results'];
        }

        return $response;
    }
}
