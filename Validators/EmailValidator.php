<?php
namespace Validator\Validators;

class EmailValidator extends Validator
{
    protected $filePath = '';


    public function __construct(array $registered, $file_path = 'test')
    {
        parent::__construct($registered);
        $this->filePath = $file_path;
    }

    /**
     * execute validator
     * @return mixed
     */
    public function go()
    {
        $lines = file($this->filePath);

        // Loop through file line by line
        foreach ($lines as $line_num => $line) {

            $is_failed = false;
            $fail_reasons = '';

            foreach ($this->registered as $checker) {

                $class = 'Validator\Checkers\\' . ucfirst($checker);

                $line = trim(strtolower($line));
                $result = $class::check($line);

                if (!$result) {
                    $is_failed = true;
                    $fail_reasons.= $class::reason().',';
                }
            }

            if (!$is_failed) {
                $this->validStrings[] = array('line_num' => $line_num, 'line' => $line);
            }else{
                $fail_reasons = rtrim($fail_reasons, ',');
                $this->invalidStrings[] = array('line_num' => $line_num, 'line' => $line, 'failed_reasons' => $fail_reasons);

            }

        }
    }


}

