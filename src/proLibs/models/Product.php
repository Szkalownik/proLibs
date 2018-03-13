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

namespace proLibs\models;

use \Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package proLibs\models
 */
class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'tblproducts';

    /**
     * @return array|null
     */
    public function getServers()
    {
        $servers = null;

        foreach (ServerGroupsRel::where('groupid', $this->servergroup)->get() as $serverGroupsRel) {
            $server = Servers::find($serverGroupsRel->serverid);
            $servers[] = $server;
        }

        return $servers;
    }
}