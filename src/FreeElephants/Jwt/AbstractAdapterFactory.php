<?php

namespace FreeElephants\Jwt;

abstract class AbstractAdapterFactory
{

    abstract public function createDecoder(string $key, array $allowedAlgorithms): DecoderInterface;

    abstract public function createEncoder($key): EncoderInterface;
}