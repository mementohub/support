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
     * @param  string $path
     * @return string
     */
    function imemento_asset(string $path): string
    {
        return asset($path, env('HTTP_SECURE'));
    }
}

if (! function_exists('imemento_url')) {
    /**
     * Detects url secure based on env var.
     *
     * @param  string $path
     * @param  array $parameters
     * @return \Illuminate\Contracts\Routing\UrlGenerator|string
     */
    function imemento_url(string $path = null, array $parameters = [])
    {
        return url($path, $parameters, env('HTTP_SECURE'));
    }
}

if (! function_exists('imemento_request_scheme')) {
    /**
     * Detects secure based on env var and return http(s) scheme.
     *
     * @return string
     */
    function imemento_request_scheme(): string
    {
        return env('HTTP_SECURE') ? 'https' : 'http';
    }
}