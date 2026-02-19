<?php

namespace iMemento\Support\Tests\Serializers;

use iMemento\Support\Serializers\IMementoSerializer;
use League\Fractal\Pagination\CursorInterface;
use League\Fractal\Pagination\PaginatorInterface;
use League\Fractal\Resource\ResourceInterface;
use Orchestra\Testbench\TestCase;

function imemento_request_scheme()
{
    return 'https';
}

function env()
{
    return 'local';
}

class IMementoSerializerTest extends TestCase
{
    public function test_serializer_collection()
    {
        $serializer = new IMementoSerializer('https');
        $collection = $serializer->collection('some_key', ['key' => 'value']);

        $this->assertEquals(['data' => ['key' => 'value']], $collection);
    }

    public function test_serializer_item()
    {
        $serializer = new IMementoSerializer('https');
        $item = $serializer->item('some_key', ['key' => 'value']);

        $this->assertEquals(['key' => 'value'], $item);
    }

    public function test_serializer_null()
    {
        $serializer = new IMementoSerializer('https');
        $null = $serializer->null();

        $this->assertEquals([], $null);
    }

    public function test_included_data()
    {
        $resource_interface = $this->getMockBuilder(ResourceInterface::class)->getMock();

        $serializer = new IMementoSerializer('https');
        $included = $serializer->includedData($resource_interface, ['key' => 'value']);

        $this->assertEquals(['key' => 'value'], $included);
    }

    public function test_meta()
    {
        $serializer = new IMementoSerializer('https');
        $meta = $serializer->meta(['key' => 'value']);

        $this->assertArrayHasKey('key', $meta);
        $this->assertEquals('value', $meta['key']);
        $this->assertArrayHasKey('meta', $meta);
        $this->assertIsArray($meta['meta']);
        $this->assertArrayHasKey('stamp', $meta['meta']);
    }

    public function test_empty_meta()
    {
        $serializer = new IMementoSerializer('https');
        $meta = $serializer->meta([]);

        $this->assertEquals([], $meta);
    }

    public function test_paginator()
    {
        $serializer = new IMementoSerializer('https');

        $paginator_interface = $this->getMockBuilder(PaginatorInterface::class)->getMock();
        $paginator_interface->expects($this->any())->method('getTotal')->willReturn(1);
        $paginator_interface->expects($this->any())->method('getPerPage')->willReturn(1);
        $paginator_interface->expects($this->any())->method('getCurrentPage')->willReturn(1);
        $paginator_interface->expects($this->any())->method('getLastPage')->willReturn(1);
        $paginator_interface->expects($this->any())->method('getCount')->willReturn(1);
        $paginator_interface->expects($this->any())->method('getUrl')->willReturn('1');

        $expected = ['pagination' => [
            'total' => 1,
            'per_page' => 1,
            'current_page' => 1,
            'last_page' => 1,
            'from' => 1,
            'to' => 1,
            'count' => 1,
            'links' => [
                'first_page_url' => '1',
                'last_page_url' => '1',
                'next_page_url' => null,
                'prev_page_url' => null,
            ],
        ]];

        $this->assertEquals($expected, $serializer->paginator($paginator_interface));
    }

    public function test_cursor()
    {
        $serializer = new IMementoSerializer('https');

        $cursor_interface = $this->getMockBuilder(CursorInterface::class)->getMock();

        $cursor_interface->expects($this->any())->method('getCurrent')->willReturn(1);
        $cursor_interface->expects($this->any())->method('getPrev')->willReturn(1);
        $cursor_interface->expects($this->any())->method('getNext')->willReturn(1);
        $cursor_interface->expects($this->any())->method('getCount')->willReturn(1);

        $expected = [
            'cursor' => [
                'current' => 1,
                'prev' => 1,
                'next' => 1,
                'count' => 1,
            ],
        ];

        $this->assertEquals($expected, $serializer->cursor($cursor_interface));
    }
}
