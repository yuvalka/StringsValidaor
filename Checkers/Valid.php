<?php
namespace Validator\Checkers;


/**
 * Class Valid
 * @author Yuvalk
 */
class Valid implements iChecker
{
    /**
     * @param $str
     * @return bool
     */
    public static function check($str)
    {
        return filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public static function reason()
    {
       return 'invalid email format';
    }


}