<?php


namespace FreeElephants\Jwt\Firebase;


use PHPUnit\Framework\TestCase;

class FirebaseEncoderAdapterTest extends TestCase
{

    const EXAMPLE_JWT = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdXRoaWQiOiJqb2UiLCJhdXRocm9sZXMiOlsic3Vic2NyaWJlciJdfQ.Lxyy1H3gfs1FV5UJLGxfAYvS1TJeiJhVInu5GIlccg4';

    public function testEncode()
    {
        $encoder = new FirebaseEncoderAdapter('example_key', ['HS256', 'HS384']);
        $this->assertSame(self::EXAMPLE_JWT, $encoder->encode(['authid' => 'joe', 'authroles' => ['subscriber']], 'HS256'));
    }
}