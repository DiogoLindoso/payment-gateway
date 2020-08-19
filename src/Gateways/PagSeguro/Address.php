<?php

namespace BeerAndCodeTeam\PaymentGateway\Gateways\PagSeguro;

class Address
{
   private string $country;
   private string $region;
   private string $regionCode;
   private string $city;
   private string $postalCode;
   private string $street;
   private string $number;
   private string $locality;

   public function setCountry(string $country)
   {
      $this->country = $country;
   }

   public function getCountry()
   {
      return $this->country;
   }
}