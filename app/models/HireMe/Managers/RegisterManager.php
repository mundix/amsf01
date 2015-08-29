<?php

namespace HireMe\Managers;
use Commons\Managers\BaseManager;

//Hay qye definir el metodo getrules
class RegisterManager extends  BaseManager
{
    //Aqui se van a poner las reglasdel controller, de usuarios
    public function getRules()
    {
        $rules = [
            'full_name' => 'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|confirmed', //busca que existe un campo con el prefijo confirmation
            'password_confirmation' => 'required' //Esto esta demas por que es confirmado.
        ];
        return $rules;
    }

    public function prepareData($data)
    {
        $this->entity->location_id = 1;
        $data['location_id'] = 1;
        return $data;
    }

}