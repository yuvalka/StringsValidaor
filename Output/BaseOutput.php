<?php
namespace Validator\Output;


use Validator\Validators\Validator;

/**
 * Class BaseOutput
 * @package Validator\Output
 * @author yuvalK
 */
abstract class BaseOutput
{

    protected $validator = null;

    public function __construct(Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * output validator's results
     * @return mixed
     */
    abstract public function output();

    /**
     *  basic print out validator's result
     *
     */
    public function printOut()
    {
        $results = $this->validator->getResults();

        if (!$results) {
            print 'no results';
        }

        if (isset($results['valid']) && $valid_strings = $results['valid']) {
            print "\nvalid strings: \n\n";

            foreach ($valid_strings as $valid_string) {
                printf("line %d : %s \n", $valid_string['line_num'], $valid_string['line']);
            }
        }

        if (isset($results['invalid']) && $invalid_strings = $results['invalid']) {
            print "\ninvalid strings: \n\n";

            foreach ($invalid_strings as $invalid_string) {
                printf("line %d : %s reasons: %s \n", $invalid_string['line_num'], $invalid_string['line'], $invalid_string['failed_reasons']);
            }
        }

    }



}