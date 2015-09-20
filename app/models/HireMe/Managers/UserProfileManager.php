<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class UserProfileManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'phone'   => '',
            'gender'   => 'in:male,female',
            'available'     => 'in:1,0'
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        if(!isset($data['available']))
        {
            $data['available'] = 0;
        }
        $this->entity->gender = $data['gender'];
        $this->entity->phone = $data['phone'];

        return $data;
    }

}