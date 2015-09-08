<?php
/**
 * Created by PhpStorm.
 * User: clementepichardo
 * Date: 8/29/15
 * Time: 6:22 PM
 */

namespace Commons\Repositories;
use Commons\Entity\Configuration;

class ConfigRepo extends BaseRepo
{
    public function getModel()
    {
        return new Configuration();
    }

    public function getValueByAlias($alias = null)
    {
        return Configuration::where('alias',$alias)->get();
    }
}