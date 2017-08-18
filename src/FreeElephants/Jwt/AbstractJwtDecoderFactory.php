<?php

namespace FreeElephants\Jwt;

abstract class AbstractJwtDecoderFactory
{

    abstract public function createJwtDecoderAdapter(string $key, array $allowedAlgorithms): JwtDecoderInterface;
}