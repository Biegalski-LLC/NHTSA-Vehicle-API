<?php

namespace BiegalskiLLC\NHTSAVehicleAPI\Services;

/**
 * Class Service
 */
class Service
{
    /**
     * @var mixed
     */
    public $config;

    /**
     * Create a new Skeleton Instance
     */
    public function __construct()
    {
        $this->config = include( __DIR__ . '/../../config/nhtsa.php');
    }

}
