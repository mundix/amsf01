<?php

namespace HireMe\Repositories;

use Commons\Repositories\BaseRepo;
use HireMe\Entities\Candidate;
use HireMe\Entities\Category;
use HireMe\Entities\User;

class CandidateRepo extends BaseRepo
{
    /**
     *
     * Este metodo debe estar definido en todos los repos que lo utilizen
     *
     */
    public function getModel()
    {
        return new Candidate;
    }

    public function findLastest($take = 10)
    {
        return Category::with([
            'candidates' => function($q) use ($take){
                $q->take($take); //Creano Variable
                $q->orderBy('created_at','DESC');
            },
            'candidates.user'])->get();
    }

    /**
     * Function para devolder un nuevo Candidato.
    */
    public function newCandidate()
    {
        $user = new User();
        $user->type = 'candidate';
        return $user;
    }
}