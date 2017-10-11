<?php

use iMemento\Support\Identity;

if (! function_exists('identity_encode')) {
    /**
     * Encodes user id & agency id arrays into identity arrays.
     *
     * @param  array $ids
     * @return array
     */
    function identity_encode(array $ids): array
    {
        return Identity::encode($ids);
    }
}

if (! function_exists('identity_decode')) {
    /**
     * Decodes identity arrays into user id & agency id arrays.
     *
     * @param  array $identities
     * @return array
     */
    function identity_decode(array $identities): array
    {
        return Identity::decode($identities);
    }
}
