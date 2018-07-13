<?php

namespace iMemento\Support;

/**
 * Class IdGenerator
 *
 * @package iMemento\Support
 */
class IdGenerator
{

    /**
     * @var string
     */
    protected static $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';

    /**
     * @var array
     */
    protected static $swear_words = [
        'ad', 'anal', 'anus', 'arse', 'ass', 'balls', 'bastard', 'bitch', 'blood', 'blow', 'bollock', 'boner', 'boob', 'bugger', 'bum', 'butt', 'clitoris', 'cock', 'coon', 'crap', 'cum', 'cunt', 'damn', 'dick', 'dildo', 'dyke', 'fag', 'fuck', 'flange', 'homo', 'jerk', 'jizz', 'knob', 'labia', 'muff', 'nigger', 'nigga', 'penis', 'piss', 'poop', 'prick', 'pube', 'pussy', 'queer', 'scrotum', 'sex', 'shit', 'slut', 'smegma', 'spunk', 'tit', 'turd', 'twat', 'vagina', 'wank', 'whore', 'wtf'
    ];

    /**
     * @param int $length
     * @return string
     */
    public static function generate(int $length = 6) : string
    {
        $hash = '';
        $alphabet_len = strlen(self::$alphabet);

        for ($i = 0; $i < $length; $i++) {
            $p = mt_rand(0, $alphabet_len - 1);
            $hash .= self::$alphabet[$p];
        }

        while (self::hasSwearWords(self::$swear_words, $hash) === true) {
            return self::generate($length);
        }

        return $hash;
    }

    /**
     * @param array  $swear_words
     * @param string $hash
     * @return bool
     */
    protected static function hasSwearWords(array $swear_words, string $hash)
    {
        foreach ($swear_words as $swear) {
            if (strpos($hash, $swear) !== false)
                return true;
        }
    }

}