<?php

namespace Commons\Repositories;

/**
 * Esta clase nunca debe extenderse
 */
abstract class BaseRepo
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }
    /**
     * Este metodo debe estar definido en todos los repos que lo utilizen
    */
    abstract public function getModel();

    public function find($id)
    {
        return $this->model->find($id);
    }
    /**
     * @param String $orderBy
     * @param String $sort
     * @return Array
    */
    public function all($orderBy = null,$sort = 'ASC')
    {
        if(!is_null($orderBy))
            return $this->model->orderBy($orderBy,$sort)->get();
        return $this->model->all();
    }

    public function getList()
    {
        return $this->model->lists('name','id','value');
    }

    public function getTotal()
    {
        return $this->model->get()->count();
    }
}