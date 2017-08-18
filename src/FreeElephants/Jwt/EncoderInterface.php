<?php


namespace FreeElephants\Jwt;


interface EncoderInterface
{

    /**
     * @param array|object $token
     * @return string
     */
    public function encode($token, string $algorithm): string;
}