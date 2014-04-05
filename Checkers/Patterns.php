<?php
namespace Validator\Checkers;
/**
 * Class Patterns
 * checks that a string doesnt include patterns
 * @package Validator\Checkers
 */
class Patterns implements iChecker
{

    protected static $patterns = array();
    protected static $results = array();

    /**
     * @param $str
     * @return bool
     */
    public static function check($str)
    {
        static::initPatterns();

        foreach (static::$patterns as $what => $pattern) {
            preg_match_all($pattern, $str, $matches);

            if (count($matches[0]) > 0) {
                static::$results[] = $what;
            }
        }

        if (count(static::$results) > 0) {
            return false;
        }
        return true;

    }

    /**
     * @return string
     */
    public static function reason()
    {
        return 'invalid patterns ('.implode(',', static::$results).')';
    }


    protected static function initPatterns()
    {

        static::$results = array();
        // set here patterns
        static::$patterns = array('repetitive character' => '/(.)\1\1/');

    }


}