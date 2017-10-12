<?php

namespace iMemento\Support;

class Identity
{
    const GLUE = '.';

    /**
     * @param array $ids
     * @param bool $keys
     * @return array
     */
    public static function encode(array $ids, $keys = false): array
    {
        return array_map(
            function ($id) use ($keys) {
                if ($keys) {
                    return $id['user_id'] .self::GLUE . ($id['agency_id'] ?? '');
                }

                return $id[0] . self::GLUE . ($id[1] ?? '');
            },
            $ids
        );
    }

    /**
     * @param array $identities
     * @param bool $keys
     * @return array
     */
    public static function decode(array $identities, $keys = false): array
    {
        return array_map(
            function ($identity) use ($keys) {
                $parts = explode(self::GLUE, $identity);

                if ($keys) {
                    return [
                        'user_id'   => $parts[0],
                        'agency_id' => $parts[1] ?? null
                    ];
                }

                return [$parts[0], $parts[1] ?? null];
            },
            $identities
        );
    }
}
