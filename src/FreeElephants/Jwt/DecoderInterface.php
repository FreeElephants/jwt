<?php


namespace FreeElephants\Jwt;


interface DecoderInterface
{

    public function getAlgorithms(): array;

    public function setAlgorithms(array $algorithms);

    public function decode(string $signature): \stdClass;

    public function getSupportedAlgorithms(): array;
}