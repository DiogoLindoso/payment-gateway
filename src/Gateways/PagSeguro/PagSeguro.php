<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

use Illuminate\Support\Facades\Http;
use BeerAndCodeTeam\PaymentGateway\Models\PagSeguroCharge;

class PagSeguro extends PagSeguroBase
{

    public function charge(PagSeguroCharge $chargeData)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->post(
            $this->baseUrl . 'charges',
            [
                $chargeData->getChargeData()
            ]
        );

        return collect($response->json());
    }
    public function findCharge(string $chargeId)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->get($this->baseUrl . 'charges/' . $chargeId,);
        return $response;
    }
    public function refound(string $chargeId, int $value)
    {
        $response = Http::withHeaders([
            $this->headers
        ])->post($this->baseUrl . $chargeId . '/cancel', [
            'amount' => [
                'value' => 99500, // value for refund
                'sumary' => [
                    'refunded' => true
                ]
            ]
        ]);
        return $response;
    }
}
