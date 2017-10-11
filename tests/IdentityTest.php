<?php

namespace iMemento\Support\Tests;

use iMemento\Support\Identity;

class IdentityTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function encode_uses_glue_to_transform_user_id_agency_id_into_identity()
    {
        $actual = [[1, 3], [2, null], [3]];
        $expected = ['1.3', '2.', '3.'];
        $this->assertEquals($expected, Identity::encode($actual));
        $this->assertEquals($expected, identity_encode($actual));
    }

    /** @test */
    public function decode_uses_glue_to_transform_identity_into_user_id_agency_id()
    {
        $actual = ['1.3', '2.'];
        $expected = [[1, 3], [2, null]];
        $this->assertEquals($expected, Identity::decode($actual));
        $this->assertEquals($expected, identity_decode($actual));
    }
}