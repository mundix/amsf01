<?php

use HireMe\Managers\RegisterManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;
use HireMe\Managers\AccountManager;
use HireMe\Managers\ProfileManager;
use HireMe\Managers\UserProfileManager;
use HireMe\Repositories\LocationRepo;


class UsersController extends AssetsController
{
    protected $candidateRepo;
    protected $categoryRepo;
    protected $locationRepo;

    public function __construct(CandidateRepo $candidateRepo,CategoryRepo $categoryRepo,LocationRepo $locationRepo)
    {
        $this->candidateRepo    = $candidateRepo;
        $this->categoryRepo     = $categoryRepo;
        $this->locationRepo     = $locationRepo;
    }

    public function dashboard()
    {
        $employees      = $this->candidateRepo->all();
        $javascripts    = array_merge($this->getScripts(),$this->getJsDataTables());
        $data           = $this->getProductsData();
        return View::make("themes/{$this->theme}/pages/resources/employees/dashboard",compact('employees','javascripts','data'));
    }

    public function signUp()
    {
//        if(is_admin())
//        {
//            echo "Es admin";
//        }
//        return View::make('users/sign-up');
    }

    public function save()
    {

        $user       = $this->candidateRepo->newCandidate();
        $manager    = new RegisterManager($user,Input::all());
        $user_id    = $manager->save();
        $this->candidateRepo->save($this->candidateRepo->findUser($user_id),Input::all());
        \Session::push('form.validation.success','El usuario fu&eacute; creado.');
        return Redirect::route('employees');
    }

    public function account()
    {
        $user = Auth::User();
        $javascripts = $this->getScripts();
        $data = $this->getProductsData();
        return View::make("themes/{$this->theme}/forms/resources/employees/edit",compact('user','data','javascripts')); //Tambien se pued hacer con with->('user')
    }

    public function updateAccount()
    {
        $user = Auth::user();
        $manager = new AccountManager($user,Input::all());
        $manager->save();
        $candidate = $user->getCandidate();
        $manager = new UserProfileManager($candidate,Input::all());
        $manager->save();

        return Redirect::route('home');
    }

    public function profile()
    {
        $user = Auth::user();
        $candidate = $user->getCandidate();
        $categories = $this->categoryRepo->getList();
        $job_types = \Lang::get('utils.job_types');
        return View::make('users/profile',compact('user','candidate','categories','job_types'));
    }

    public function updateProfile()
    {
        $user = Auth::user();
        $candidate = $user->getCandidate();
        $manager = new ProfileManager($candidate,Input::all());
        $manager->save();
        \Session::push('form.validation.success','El perfil fu&eacute; actualziado.');
        return Redirect::route('home');
    }

    public function reset($id)
    {
        if(Request::ajax())
        {
            $candidate = $this->candidateRepo->find($id);
            $this->candidateRepo->resetPassword($this->candidateRepo->findUserByEmail($candidate->user->email));
            return json_encode(['success' => 200,"email"=>$candidate->user->email]);
        }
        return json_encode(['error' => 400]);
    }

    /**
     * Add new user form
    */
    public function add()
    {
        $javascripts = $this->getScripts();
        $locations  = $this->locationRepo->getList();
        $data = $this->getProductsData();
        return View::make("themes/{$this->theme}/forms/resources/employees/add",compact('employees','javascripts','data','locations'));
    }

    public function delete($id)
    {
        if(!is_null($entity = $this->candidateRepo->findUser($id)))
        {
            $entity->forceDelete();
            \Session::push('form.validation.success','El usuario fu&eacute; eliminado.');
        }
        return Redirect::route('employees');
    }

    public function show()
    {

    }
}