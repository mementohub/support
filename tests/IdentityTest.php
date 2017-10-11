<?php

namespace iMemento\Support\Tests;

use iMemento\Support\Identity;

class IdentityTest extends \PHPUnit\Framework\TestCase
{
    /** @test */
    public function encode_uses_glue_to_transform_user_id_agency_id_into_identity()
    {
        $expected = ['1.3', '2.', '3.'];
        $this->assertEquals($expected, Identity::encode([[1, 3], [2, null], [3]]));
    }

    /** @test */
    public function decode_uses_glue_to_transform_identity_into_user_id_agency_id()
    {
        $expected = [[1, 3], [2, null]];
        $this->assertEquals($expected, Identity::decode(['1.3', '2.']));
    }
}