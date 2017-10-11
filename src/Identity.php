<?php

namespace iMemento\Support;

class Identity
{
    const GLUE = '.';

    /**
     * @param array $ids
     * @return array
     */
    public static function encode(array $ids): array
    {
        return array_map(
            function ($id) {
                return $id[0] . self::GLUE . ($id[1] ?? '');
            },
            $ids
        );
    }

    /**
     * @param array $identities
     * @return array
     */
    public static function decode(array $identities): array
    {
        return array_map(
            function ($identity) {
                $parts = explode(self::GLUE, $identity);
                return [$parts[0], $parts[1] ?? null];
            },
            $identities
        );
    }
}
