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

//        $data['slug'] = \Str::slug($this->entity->user->full_name);
//        $this->entity->slug = \Str::slug($this->entity->user->full_name);

        return $data;
    }

}