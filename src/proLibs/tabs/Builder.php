<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace proLibs\tabs;

use proLibs\extensions\Smarty;

/**
 * Description of Buildier
 *
 * @author Szkalownik
 */
class Builder
{
    public $tabs;

    public function addTab(Tab $tab)
    {
        $this->tabs[] = $tab;
    }

    public function createTabs()
    {
        $vars['tabs'] = $this->tabs;
        return Smarty::I()->view('content', $vars, dirname(__FILE__).DS.'templates');
    }
}