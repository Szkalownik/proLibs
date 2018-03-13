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

namespace proLibs\exceptions;

/**
 * Class System
 * @package proLibs\exceptions
 */
class System extends Base
{

    /**
     * System constructor.
     * @param $message
     * @param int $code
     * @param null $previous
     */
    public function __construct($message, $code = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}