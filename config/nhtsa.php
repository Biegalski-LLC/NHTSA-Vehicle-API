<?php

return [
    'decode' => [
        'vin' => 'https://vpic.nhtsa.dot.gov/api/vehicles/decodevin/:VIN'
    ],
    'list' => [
        'makes' => 'https://vpic.nhtsa.dot.gov/api/vehicles/getallmakes?format=json',
        'models_by_make_id' => 'https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/:MAKEID?format=json',
        'models_by_make_id_year' => 'https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeIdYear/makeId/:MAKEID/modelyear/:YEAR?format=json'
    ]
];
