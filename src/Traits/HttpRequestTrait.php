<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Traits;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Trait HttpRequestTrait
 * @package BiegalskiLLC\NHTSAVehicleAPI\Traits
 */
trait HttpRequestTrait
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param string $url
     * @return mixed|string
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function httpRequest(string $url)
    {
        try {

            $this->client = new Client();

            $response = $this->client->request(
                'GET',
                $url
            );

            return json_decode($response->getBody(), true);

        } catch (GuzzleException $e) {

            return $e->getMessage();

        }
    }

    /**
     * @param string $url
     * @param array $variables
     * @return string|string[]
     */
    public function swapUrlVariables(string $url, array $variables)
    {
        foreach ($variables as $key => $value) {
            $url = str_replace($key, $value, $url);
        }

        return $url;
    }
}
