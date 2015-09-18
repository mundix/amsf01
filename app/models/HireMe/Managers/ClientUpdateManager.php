<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class ClientUpdateManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'name'          => 'required',
            'type'          => 'required|in:person,company',
            'rnc'           => '',
            'noid'          => '',
            'phone'         =>'',
            'cellphone'     =>'numeric',
            'email'         =>'email',
            'address'       =>'',
            'contact_name'  =>'' ,
            'comments'      =>'' ,
            'available'     =>'in:0,1' ,

        ];
        return $rules;
    }

    public function prepareData($data)
    {
        if(isset($data['available']))
            $data['available'] = 1;
        else
            $data['available'] = 0;
        return $data;
    }

}