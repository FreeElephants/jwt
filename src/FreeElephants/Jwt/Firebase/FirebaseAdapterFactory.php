<?php


namespace FreeElephants\Jwt\Firebase;


use FreeElephants\Jwt\AbstractAdapterFactory;
use FreeElephants\Jwt\DecoderInterface;
use FreeElephants\Jwt\EncoderInterface;

class FirebaseAdapterFactory extends AbstractAdapterFactory
{

    public function createDecoder(string $key, array $allowedAlgorithms): DecoderInterface
    {
        return new FirebaseDecoderAdapter($key, $allowedAlgorithms);
    }

    public function createEncoder($key): EncoderInterface
    {
        return new FirebaseEncoderAdapter($key);
    }
}