<?php
namespace Validator\Checkers;


/**
 * Class iChecker
 * @author YuvalK
 */
interface iChecker
{
    /**
     * @param $str
     * @return bool
     */
    public static function check($str);

    /**
     * @return string
     */
    public static function reason();
}