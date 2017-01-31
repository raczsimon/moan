<?php
namespace mheinzerling\commons;

class StringUtils
{
    public static function startsWith($haystack, $needle)
    {
        if (is_null($needle)) return false;
        $length = strlen($needle);
        if ($length == 0) return true;
        return substr($haystack, 0, $length) === $needle;
    }

    public static function endsWith($haystack, $needle)
    {
        if (is_null($needle)) return false;
        $length = strlen($needle);
        if ($length == 0) return true;
        return substr($haystack, -$length) == $needle;
    }

    public static function contains($haystack, $needle, $ignoreCase = true)
    {
        if ($ignoreCase) return stristr($haystack, $needle) !== FALSE;
        return strstr($haystack, $needle) !== FALSE;
    }

    public static function firstCharToUpper($string)
    {
        return ucfirst($string);
    }
	
	public static function firstCharToLower($string)
    {
        return lcfirst($string);
    }
	
    public static function trimExplode($delimiter, $input)
    {
        if (is_null($input)) return array();

        if (self::isBlank($delimiter)) {
            return array(trim($input));
        }
        $arr = explode($delimiter, $input);
        return array_map('trim', $arr);
    }

    public static function isBlank($str)
    {
        if (is_null($str)) return true;
        return trim($str) === '';
    }
}