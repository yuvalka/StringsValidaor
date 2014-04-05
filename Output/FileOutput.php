<?php
namespace Validator\Output;


use Validator\Validators\Validator;

/**
 * Class FileOutput
 * @package Validator\Output
 * @author yuvalK
 */
class FileOutput extends BaseOutput
{
    protected $result_path = '';

    public function __construct(Validator $validator, $path = 'results')
    {

        parent::__construct($validator);
        $this->result_path = $path;

    }

    public function output()
    {
        $results = $this->validator->getResults();
        file_put_contents($this->result_path, '');

        if (!$results) {
            file_put_contents($this->result_path, 'no results');
        }

        if (isset($results['valid']) && $valid_strings = $results['valid']) {
            file_put_contents($this->result_path, "\nvalid strings: \n\n", FILE_APPEND);

            foreach ($valid_strings as $valid_string) {
                file_put_contents($this->result_path, sprintf("line %d : %s \n",
                    $valid_string['line_num'], $valid_string['line']), FILE_APPEND);
            }
        }

        if (isset($results['invalid']) && $invalid_strings = $results['invalid']) {
            file_put_contents($this->result_path, "\ninvalid strings: \n\n", FILE_APPEND);

            foreach ($invalid_strings as $invalid_string) {
                file_put_contents($this->result_path, sprintf("line %d : %s reasons: %s \n",
                    $invalid_string['line_num'], $invalid_string['line'], $invalid_string['failed_reasons']), FILE_APPEND);
            }
        }

    }


}