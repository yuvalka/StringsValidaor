<?php
namespace Validator\Checkers;

/**
 * Class Domain
 * Checks that a given email is not included forbidden emails (hard coded list or external file)
 * @package Validator\Checkers
 * @auhtor yuvalK
 */
class Domain implements iChecker
{

    protected static $domains_list = array('test.com','xxx.com');
    protected static $domains_path = 'resources/forbiddenDomains';

    public static function check($str)
    {
        $content = file_get_contents(static::$domains_path);
        $forbiddenDomainsFiles = explode(',',$content);
        $domains_list = array_merge(self::$domains_list,$forbiddenDomainsFiles);

        $domain = array_pop(explode('@', $str));

        if (!in_array($domain,$domains_list)) {
            return true;
        }

        return false;
    }

    public static function reason()
    {
        return 'invalid domain';
    }


}