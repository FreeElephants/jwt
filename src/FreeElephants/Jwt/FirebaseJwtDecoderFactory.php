<?php


namespace FreeElephants\Jwt;


class FirebaseJwtDecoderFactory extends AbstractJwtDecoderFactory
{

    public function createJwtDecoderAdapter(string $key, array $allowedAlgorithms): JwtDecoderAdapterInterface
    {
        return new FirebaseJwtDecoderAdapter($key, $allowedAlgorithms);
    }
}