<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class ClientRegisterManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'name' => 'required',
            'type' => 'required|in:persona,company',
            'rnc' => 'unique:clients,rnc',
            'noid' =>'unique:clients,noid',
            'phone' =>'numeric',
            'cellphone' =>'numeric',
            'email' =>'email',
            'address' =>'',
            'contact_name' =>'' ,
            'comments' =>'' ,
            'available' =>'in|0,1' ,

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