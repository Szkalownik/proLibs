<?php
/**
 *  * ******************************************************************
 *
 *    CREATED BY Dariusz Bijoś
 *    AUTHOR                         ->        Dariusz Bijoś <dariuszbijos@gmail.com>
 *    CONTACT                        ->        dariuszbijos@gmail.com
 *
 *   This software is furnished under a license and may be used and copied
 *   only  in  accordance  with  the  terms  of such  license and with the
 *   inclusion of the above copyright notice.  This software  or any other
 *   copies thereof may not be provided or otherwise made available to any
 *   other person.  No title to and  ownership of the  software is  hereby
 *   transferred.
 *
 *  * ******************************************************************
 */

namespace proLibs\extensions;

use proLibs\exceptions\System;

/**
 * Class Smarty
 * @package proLibs\extensions
 */
class Smarty
{
    /**
     * @var
     */
    static private $_instance;
    /**
     * @var
     */
    private $_smarty;
    /**
     * @var
     */
    private $_templateDIR;

    /**
     * @return Smarty
     */
    public static function I()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();

            if (!class_exists('Smarty')) {
                if (file_exists(ROOTDIR.DS.'includes'.DS.'smarty'.DS.'Smarty.class.php')) {
                    require_once(ROOTDIR.DS.'includes'.DS.'smarty'.DS.'Smarty.class.php');
                } else {
                    die('Smarty does not exists!');
                }
            }

            self::$_instance->_smarty = new \Smarty();
        }

        return self::$_instance;
    }

    /**
     * @param $dir
     * @throws System
     */
    public function setTemplateDir($dir)
    {
        if (is_array($dir)) {
            throw new System('Wrong Template Path');
        }
        self::I()->_templateDIR = $dir;
    }

    /**
     * @param $template
     * @param array $vars
     * @param bool $customDir
     * @return mixed
     * @throws System
     */
    function view($template, $vars = array(), $customDir = false)
    {
        if (is_array($customDir)) {
            throw new System('Wrong Template Path');
        }

        global $templates_compiledir;
        if ($customDir) {
            self::I()->_smarty->template_dir = $customDir;
        } else {
            self::I()->_smarty->template_dir = self::I()->_templateDIR;
        }

        self::I()->_smarty->compile_dir   = $templates_compiledir;
        self::I()->_smarty->force_compile = 1;
        self::I()->_smarty->caching       = 0;
        $this->clear();

        if (is_array($vars)) {
            foreach ($vars as $key => $val) {
                self::I()->_smarty->assign($key, $val);
            }
        }

        if (is_array(self::I()->_smarty->template_dir)) {
            $file = self::I()->_smarty->template_dir[0].$template.'.tpl';
        } else {
            $file = self::I()->_smarty->template_dir.$template.'.tpl';
        }
        if (!file_exists($file)) {
            throw new System('Unable to find Template:'.$file);
        }

        return self::I()->_smarty->fetch($template.'.tpl', uniqid());
    }

    /**
     * @return void
     */
    protected function clear()
    {
        if (method_exists(self::I()->_smarty, 'clearAllAssign')) {
            self::I()->_smarty->clearAllAssign();
        } elseif (method_exists(self::I()->_smarty, 'clear_all_assign')) {
            self::I()->_smarty->clear_all_assign();
        }
    }
}