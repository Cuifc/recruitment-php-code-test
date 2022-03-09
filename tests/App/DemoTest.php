<?php

namespace Test\App;

use App\Service\AppLogger;
use PHPUnit\Framework\TestCase;

class DemoTest extends TestCase
{
    public function testGetUserInfo()
    {
        $obj = new \Demo(new AppLogger(), new \HttpRequest());
        $this->assertJsonStringEqualsJsonString(
            json_encode($obj->get_user_info()),
            '{"error": 0, "data": {"id": 1, "username": "hello world"}}'
        );
    }
}