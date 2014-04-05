<?php
namespace Validator\Checkers;

/**
 * Class Characters
 * checks that string doesnt include special characters
 * @package Validator\Checkers
 */
class Characters implements iChecker
{

    protected static $resultSpecial = '';

    public static function check($str)
    {

        static::$resultSpecial = '';

        if (preg_match_all('/[#$%^&\s*!]+/', $str, $matches))
        {

            static::$resultSpecial = implode(',',$matches[0]);
            return false;
        }
        else
        {
            return true;            // Everything fine... carry on
        }
    }

    public static function reason()
    {
       return 'special characters ('.static::$resultSpecial.')';
    }


}