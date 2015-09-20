<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class SupplayerRegisterManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'name' => 'required',
            'rnc' => '',
            'contact_name' =>'' ,
            'phone' =>'' ,
            'description' =>'' ,
            'available' =>'in|0,1'
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        $this->entity->available= 1;
        $data['available'] = 1;
        return $data;
    }

}