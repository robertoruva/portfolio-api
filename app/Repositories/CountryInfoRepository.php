<?php

namespace App\Repositories;

use SoapClient;
use App\DTOs\CountryInfoDTO;

class CountryInfoRepository {
    protected SoapClient $client;

    public function __construct() {
        $this->client = new SoapClient('http://webservices.oorsprong.org/websamples.countryinfo/CountryInfoService.wso?WSDL');
    }

    public function getCountryInfoByIso(string $iso): CountryInfoDTO {
        $response = $this->client->FullCountryInfo([
            'sCountryISOCode' => $iso
        ]);

        $info = $response->FullCountryInfoResult;

        return new CountryInfoDTO(
            name: ucwords(strtolower(trim($info->sName ?? 'Unknown'))),
            capital: ucwords(strtolower(trim($info->sCapitalCity ?? 'Unknown'))),
            currency: strtoupper(trim($info->sCurrencyISOCode ?? 'Unknown')),
            flag: filter_var($info->sCountryFlag ?? '', FILTER_VALIDATE_URL) ?: ''
        );

    }
}
