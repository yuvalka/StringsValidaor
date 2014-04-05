<?php
namespace Validator\Validators;

/**
 * Class Validator.
 * @package Validator
 */
abstract class Validator
{
    protected $registered = array(),
              $validStrings = array(),
              $invalidStrings = array();

    public function __construct(array $registered)
    {
        $this->registered = $registered;

    }

    public function addChecker($class)
    {

        if (!in_array($class, $this->registered)) {
            $this->registered[] = $class;
        }
    }

    public function setCheckers(array $checkers)
    {
        $this->registered = $checkers;
    }

    public function removeChecker($class)
    {

        if (in_array($class, $this->registered)) {
            unset($this->registered[$class]);
        }
    }


    public function setFilePath($path)
    {

        $this->filePath = $path;
    }

    public function getFilePath($path)
    {

        return $this->filePath = $path;
    }


    /**
     * execute validator
     * @return mixed
     */
    abstract public function go();


    public function getResults()
    {

        return array('valid' => $this->validStrings,
            'invalid' => $this->invalidStrings
        );

    }


}