<?php

namespace iMemento\Support\Tests;

use iMemento\Support\IdGenerator;
use PHPUnit\Framework\TestCase;

class IdGeneratorTest extends TestCase
{
    public function test_id_length_is_correct()
    {
        for ($i = 0; $i < 5; $i++) {
            $length = mt_rand(1, 32);

            $id = IdGenerator::generate($length);

            $this->assertEquals($length, strlen($id));
        }
    }
}
