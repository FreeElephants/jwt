<?php


namespace FreeElephants\Jwt\Firebase;


use Firebase\JWT\JWT;
use FreeElephants\Jwt\EncoderInterface;

class FirebaseEncoderAdapter implements EncoderInterface
{

    /** @var string|array*/
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
    }

    /**
     * @param array|object $token
     * @return string
     */
    public function encode($token, string $algorithm): string
    {
        return Jwt::encode($token, $this->key, $algorithm);
    }
}