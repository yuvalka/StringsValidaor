<?php
namespace Validator\Checkers;

// include SMTP Email Validation Class
require_once(ROOT.'/resources/smtp_validateEmail.class.php');


/**
 * Class ExistingEmail - checks if email really exist using smpt validation library
 * @package Validator\Checkers
 * @author yuvalK
 */
class ExistingEmail implements iChecker{


    /**
     * @param $str
     * @return bool
     */
    public static function check($email)
    {

        try{
            // an optional sender
            $sender = 'tester@test.com';

            // instantiate the class
            $SMTP_Validator = new \SMTP_validateEmail();

            // turn on debugging if you want to view the SMTP transaction
            $SMTP_Validator->debug = false;

                // do the validation
            $results = @$SMTP_Validator->validate(array($email), $sender);

            // send email?
            if (isset($results[$email])) {
               return true;
            } else {
                return false;
            }
        }catch (\Exception $e){
            return false;
        }



    }

    /**
     * @return string
     */
    public static function reason()
    {
        return 'not exist';
    }


}