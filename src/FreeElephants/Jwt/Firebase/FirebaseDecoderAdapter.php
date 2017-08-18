<?php


namespace FreeElephants\Jwt\Firebase;


use Firebase\JWT\JWT;
use FreeElephants\Jwt\Exception\InvalidArgumentException;
use FreeElephants\Jwt\Exception\OutOfBoundsException;
use FreeElephants\Jwt\DecoderInterface;
use FreeElephants\Jwt\EncoderInterface;

class FirebaseDecoderAdapter implements DecoderInterface, EncoderInterface
{

    private $algorithms;
    /**
     * @var string
     */
    private $key;

    public function __construct(string $key, array $algorithms)
    {
        $this->key = $key;
        $this->setAlgorithms($algorithms);
    }

    public function getAlgorithms(): array
    {
        return $this->algorithms;
    }

    public function setAlgorithms(array $algorithms)
    {
        if (empty($algorithms)) {
            throw new InvalidArgumentException('JWT algorithms list can not be empty');
        }

        if ($outOfSupported = array_diff($algorithms, $this->getSupportedAlgorithms())) {
            throw new OutOfBoundsException('Some algorithms out of supported in this adapter: ' . implode($outOfSupported));
        }

        $this->algorithms = $algorithms;
    }

    public function decode(string $signature): \stdClass
    {
        return JWT::decode($signature, $this->key, $this->algorithms);
    }

    public function getSupportedAlgorithms(): array
    {
        return [
            'HS256',
            'HS384',
            'HS512',
            'RS256'
        ];
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