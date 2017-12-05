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

if (! function_exists('imemento_asset')) {
    /**
     * Detects asset secure based on env var.
     *
     * @param  array $identities
     * @return string
     */
    function imemento_asset(string $path): string
    {
        return asset($path, env('HTTP_SECURE'));
    }
}

if (! function_exists('imemento_url')) {
    /**
     * Detects asset secure based on env var.
     *
     * @param  array $identities
     * @return string
     */
    function imemento_url(string $path = null, array $parameters = []): string
    {
        return url($path, $parameters, env('HTTP_SECURE'));
    }
}