<?php
namespace Validator\Checkers;

/**
 * Class Words
 * @package Validator\Checkers
 */
class Words implements iChecker{

    protected static $words_list = array('test','xxx');
    protected static $words_path = 'resources/forbiddenWords';

    private static  $forbidden_word = '';

    /**
     * @param $str
     * @return bool
     */
    public static function check($str)
    {
        static::$forbidden_word = '';

        $content = file_get_contents(static::$words_path);
        $forbiddenWordsFiles = explode(',',$content);
        $words_list = array_merge(self::$words_list,$forbiddenWordsFiles);

        foreach($words_list as $forbiddenWord){

            if (strpos($str,$forbiddenWord) !== false){
                static::$forbidden_word = $forbiddenWord;
                return false;
            }
        }

        return true;
    }

    public static function reason()
    {
        return "forbidden word (".static::$forbidden_word.")" ;
    }


}