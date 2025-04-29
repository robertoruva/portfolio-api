<?php

namespace App\DTOs;

final class CountryInfoDTO {
    public function __construct(
        public readonly string $name,
        public readonly string $capital,
        public readonly string $currency,
        public readonly string $flag
    ){}
}
