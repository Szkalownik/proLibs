<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ModulesGarden\tabs;

/**
 * Description of Tab
 *
 * @author Szkalownik
 */
class Tab
{
    public $name;
    public $id;
    public $inputs;

    public function __construct()
    {
        ;
    }

    public function addInput(Input $input)
    {
        $this->inputs[] = $input;
    }
}