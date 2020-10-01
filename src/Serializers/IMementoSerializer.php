<?php

namespace iMemento\Support\Serializers;

use League\Fractal\Pagination\CursorInterface;
use League\Fractal\Serializer\SerializerAbstract;
use League\Fractal\Resource\ResourceInterface;
use League\Fractal\Pagination\PaginatorInterface;


class IMementoSerializer extends SerializerAbstract
{
    private $scheme;

    public function __construct($scheme = null)
    {
        if (!$scheme) {
            $this->scheme = imemento_request_scheme();
        }
    }
    /**
     * Serialize a collection.
     *
     * @param string $resourceKey
     * @param array $data
     * @return array
     */
    public function collection($resourceKey, array $data)
    {
        return ['data' => $data];
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     * @param array $data
     * @return array
     */
    public function item($resourceKey, array $data)
    {
        return $data;
    }

    /**
     * Serialize null resource.
     *
     * @return array
     */
    public function null()
    {
        return [];
    }

    /**
     * Serialize the included data.
     *
     * @param ResourceInterface $resource
     * @param array $data
     * @return array
     */
    public function includedData(ResourceInterface $resource, array $data)
    {
        return $data;
    }

    /**
     * Serialize the meta.
     *
     * @param array $meta
     * @return array
     */
    public function meta(array $meta)
    {
        if (empty($meta)) {
            return [];
        }

        if (empty($meta['meta'])) {
            $meta['meta']['stamp'] = request('stamp', now()->getTimestamp());
        }
        
        return $meta;
    }

    /**
     * Serialize the paginator.
     *
     * @param PaginatorInterface $paginator
     * @return array
     */
    public function paginator(PaginatorInterface $paginator)
    {
        $total        = (int) $paginator->getTotal();
        $per_page     = (int) $paginator->getPerPage();
        $current_page = (int) $paginator->getCurrentPage();
        $last_page    = (int) $paginator->getLastPage();
        $count        = (int) $paginator->getCount();

        $pagination = [
            'total'        => $total,
            'per_page'     => $per_page,
            'current_page' => $current_page,
            'last_page'    => $last_page,
            'from'         => ($per_page * $current_page) - $per_page + 1,
            'to'           => ($per_page * $current_page + $count) - $per_page,
            'count'        => $count
        ];

        $pagination['links']['first_page_url'] = $paginator->getUrl(1);
        $pagination['links']['last_page_url']  = $paginator->getUrl($last_page);
        $pagination['links']['next_page_url']  = null;
        $pagination['links']['prev_page_url']  = null;

        if ($current_page < $last_page) {
            $pagination['links']['next_page_url'] = $paginator->getUrl($current_page + 1);
        }

        if ($current_page > 1) {
            $pagination['links']['prev_page_url'] = $paginator->getUrl($current_page - 1);
        }

        foreach ($pagination['links'] as &$link) {
            if (isset($link)) {
                $link = str_replace('http://', $this->scheme . '://', $link);
            }
        }

        return ['pagination' => $pagination];
    }

    /**
     * Serialize the cursor.
     *
     * @param CursorInterface $cursor
     * @return array
     */
    public function cursor(CursorInterface $cursor)
    {
        $cursor = [
            'current' => $cursor->getCurrent(),
            'prev'    => $cursor->getPrev(),
            'next'    => $cursor->getNext(),
            'count'   => (int)$cursor->getCount(),
        ];

        return ['cursor' => $cursor];
    }
}
