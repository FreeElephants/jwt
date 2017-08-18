<?php


namespace FreeElephants\Jwt;


class FirebaseJwtDecoderFactory extends AbstractJwtDecoderFactory
{

    public function createJwtDecoderAdapter(string $key, array $allowedAlgorithms): JwtDecoderInterface
    {
        return new FirebaseJwtDecoder($key, $allowedAlgorithms);
    }
}