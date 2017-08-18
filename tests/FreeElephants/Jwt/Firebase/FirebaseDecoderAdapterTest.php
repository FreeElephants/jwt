<?php


namespace FreeElephants\Jwt\Firebase;


use FreeElephants\Jwt\Exception\InvalidArgumentException;
use FreeElephants\Jwt\Exception\OutOfBoundsException;
use PHPUnit\Framework\TestCase;

class FirebaseDecoderAdapterTest extends TestCase
{

    const EXAMPLE_JWT = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdXRoaWQiOiJqb2UiLCJhdXRocm9sZXMiOlsic3Vic2NyaWJlciJdfQ.Lxyy1H3gfs1FV5UJLGxfAYvS1TJeiJhVInu5GIlccg4';

    public function testDecode()
    {
        $decoder = new FirebaseDecoderAdapter('example_key', ['HS256', 'HS384']);

        $expected = new \stdClass();
        $expected->authid = 'joe';
        $expected->authroles = [
            'subscriber'
        ];

        $this->assertEquals($expected, $decoder->decode(self::EXAMPLE_JWT));
    }

    public function testUseEmptyAllowedAlgorithmsListInvalidArgumentException()
    {
        $this->expectException(InvalidArgumentException::class);
        new FirebaseDecoderAdapter('example_key', []);
    }

    public function testSetAllowedAlgorithmsOutOfBoundsException()
    {
        $this->expectException(OutOfBoundsException::class);
        new FirebaseDecoderAdapter('example_key', ['foo bar']);
    }

}