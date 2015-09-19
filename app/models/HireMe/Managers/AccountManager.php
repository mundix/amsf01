<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class AccountManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'full_name' => 'required',
//            'email'     =>  'required|email|unique:users,email,'.$this->entity->id,
            'password'  =>  'confirmed',
            'password_confirmation' => '',
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        $data['full_name'] = strip_tags($data['full_name']);
//        $data['password'] = \Hast::make($data['password']);
        return $data;
    }

}