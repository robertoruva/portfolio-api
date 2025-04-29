<?php

namespace App\Services;

use App\DTOs\CountryInfoDTO;
use App\Repositories\CountryInfoRepository;

class CountryInfoService {
    public function __construct(
        protected CountryInfoRepository $repository
    ){}

    public function getCountryInfo(string $iso): CountryInfoDTO {
        return $this->repository->getCountryInfoByIso($iso);
    }
}
