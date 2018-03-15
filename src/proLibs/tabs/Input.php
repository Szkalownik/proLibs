<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace proLibs\tabs;

/**
 * Description of Input
 *
 * @author Szkalownik
 */
class Input
{
    public $label;
    public $description;
    public $type;
    public $name;
    public $id;
    public $class;
    public $value;
    public $options;

    public function __construct($inputProperties = [])
    {
        if (!empty($inputProperties)) {
            foreach ($inputProperties as $inputPropertyName => $inputPropertyValue) {
                if (property_exists($this, $inputPropertyName)) {
                    $this->{$inputPropertyName} = $inputPropertyValue;
                }
            }
        }
    }
}