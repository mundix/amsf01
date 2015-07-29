<?php

namespace Commons\Managers;

/**
 * BaseManager No se usa directamente, al igual BaseRepo
 */
abstract class BaseManager
{

    protected $entity;
    protected $data;

    public function __construct($entity,$data)
    {
        $this->entity = $entity;
        $this->data = array_only($data,array_keys($this->getRules()));
        //ESto es para validar la data directamente desde nuestras reglas.
    }

    abstract public function getRules();
    /**
     * Aqui es donde se va hacer el proceso de validacion que se tienen
     * en el controller
    */
    public function isValid()
    {
        $rules = $this->getRules();

        $validation = \Validator::make($this->data,$rules);

        if($validation->fails())
        {
            throw new ValidationException('Validation Failed',$validation->messages());
        }
    }

    public function save()
    {
        $this->isValid();

        $this->entity->fill($this->prepareData($this->data));//Asigna todos los datos, function fill de eloquent y que salve
        $this->entity->save();

        return TRUE;
    }

    public function prepareData($data)
    {
        return $data;
    }

}