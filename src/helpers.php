<?php

use iMemento\Support\Identity;

if (! function_exists('identity_encode')) {
    /**
     * Encodes user id & agency id arrays into identity arrays.
     *
     * @param  array $ids
     * @param  bool $keys
     * @return array
     */
    function identity_encode(array $ids, bool $keys = false): array
    {
        return Identity::encode($ids, $keys);
    }
}

if (! function_exists('identity_decode')) {
    /**
     * Decodes identity arrays into user id & agency id arrays.
     *
     * @param  array $identities
     * @param  bool $keys
     * @return array
     */
    function identity_decode(array $identities, bool $keys = false): array
    {
        return Identity::decode($identities, $keys);
    }
}
