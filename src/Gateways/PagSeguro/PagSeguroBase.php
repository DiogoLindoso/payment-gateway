<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use BeerAndCodeTeam\PaymentGateway\Models\PagSeguroCharge;

abstract class PagSeguroBase
{
    /** @var String $token receives PAGSEGURO_TOKEN from .env */
    protected $token = env('PAGSEGURO_TOKEN', false);

    /** @var array $headers default header for PagSeguro requests */
    protected $headers = [
        'Content-Type' => 'application/json',
        'Authorization' => $this->token,
        'x-api-version' => '4.0',
    ];
    protected $baseUrl = 'https://sandbox.api.pagseguro.com/';
    /**
     * Request in api point /charges using method POST
     *
     * @param PagSeguroCharge $chargeData Receives params for charge
     * @return json
     **/
    abstract function charge(PagSeguroCharge $chargeData);

    /**
     * Request in api point /charges/$chargeid using method GET
     *
     * @param String $chageId Receives id of charge PagSeguro
     * @return json
     **/
    abstract function findCharge(String $chargeId);

    /**
     * Request in api point /charges/$chargeid/cancel using method POST
     *
     * @param String $chageId Receives id of charge PagSeguro
     * @return json
     **/
    abstract function refound(String $chargeId, int $value);
}
