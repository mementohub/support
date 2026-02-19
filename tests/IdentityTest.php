<?php

namespace iMemento\Support\Tests;

use iMemento\Support\Identity;

class IdentityTest extends \PHPUnit\Framework\TestCase
{
    public function test_encode_uses_glue_to_transform_user_id_agency_id_into_identity()
    {
        $actual = [[1, 3], [2, null], [3]];
        $expected = ['1.3', '2.', '3.'];
        $this->assertEquals($expected, Identity::encode($actual));
        $this->assertEquals($expected, identity_encode($actual));
    }

    public function test_decode_uses_glue_to_transform_identity_into_user_id_agency_id()
    {
        $actual = ['1.3', '2.'];
        $expected = [[1, 3], [2, null]];
        $this->assertEquals($expected, Identity::decode($actual));
        $this->assertEquals($expected, identity_decode($actual));
    }

    public function test_encode_uses_glue_to_transform_user_id_agency_id_into_identity_with_keys()
    {
        $actual = [
            [
                'user_id' => 1,
                'agency_id' => 3,
            ],
            [
                'user_id' => 2,
                'agency_id' => null,
            ],
            [
                'user_id' => 3,
            ],
        ];
        $expected = ['1.3', '2.', '3.'];
        $this->assertEquals($expected, Identity::encode($actual, true));
        $this->assertEquals($expected, identity_encode($actual, true));
    }

    public function test_decode_uses_glue_to_transform_identity_into_user_id_agency_id_with_keys()
    {
        $actual = ['1.3', '2.'];
        $expected = [
            [
                'user_id' => 1,
                'agency_id' => 3,
            ],
            [
                'user_id' => 2,
                'agency_id' => null,
            ],
        ];

        $this->assertEquals($expected, Identity::decode($actual, true));
        $this->assertEquals($expected, identity_decode($actual, true));
    }
}
