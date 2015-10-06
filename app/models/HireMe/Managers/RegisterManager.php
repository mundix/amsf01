<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class RegisterManager extends  BaseManager
{
    public function getRules()
    {
        $rules = [
            'full_name'             => 'required',
            'email'                 =>  'required|email|unique:users,email',
//            'password'              =>  'required|confirmed',
//            'password_confirmation' => 'required',
            'gender'                => 'in:male,female',
            'type'                  => 'in:admin,cashier,employee',
            'phone'                 => '',
            'location'              => '',
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        $data['location_id'] = $data['location'];
        return $data;
    }

}