<?php

use HireMe\Managers\RegisterManager;
use HireMe\Repositories\CandidateRepo;
use HireMe\Repositories\CategoryRepo;
use HireMe\Managers\AccountManager;
use HireMe\Managers\ProfileManager;
use HireMe\Managers\UserProfileManager;


class UsersController extends AssetsController
{
    protected $candidateRepo;
    protected $categoryRepo;

    public function __construct(CandidateRepo $candidateRepo,CategoryRepo $categoryRepo)
    {
        $this->candidateRepo = $candidateRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function dashboard()
    {

        $employees = $this->candidateRepo->all();
        $javascripts = $this->getJsDataTables();
        $data = $this->getProductsData();
        return View::make("themes/{$this->theme}/pages/resources/employees/dashboard",compact('employees','javascripts','data'));
    }

    public function signUp()
    {
        return View::make('users/sign-up');
    }

    public function register()
    {
        $user = $this->candidateRepo->newCandidate();
        $manager = new RegisterManager($user,Input::all());
//        dd(Input::all());
        $manager->save();
        return Redirect::route('home');


    }

    public function account()
    {
//        echo "<pre>";
        $user = Auth::User();
//        print_r($user->candidate->phone);
//        return View::make('users/account',compact('user')); //Tambien se pued hacer con with->('user')
//        $javascripts = [];
        $data = $this->getProductsData();
        return View::make("themes/{$this->theme}/forms/resources/employees/edit",compact('user','data','')); //Tambien se pued hacer con with->('user')
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
        return Redirect::route('home');
    }

    public function reset()
    {
//        $user = Auth::user();
//        $this->candidateRepo->resetPassword();
//        return $this->candidateRepo->findUserByEmail('ce.pichardo@gmail.com');
//        $this->candidateRepo->resetPassword($this->candidateRepo->findUserByEmail('admin@awesomemedia.do'));
//        $this->candidateRepo->resetPassword($this->candidateRepo->findUserByEmail('lalicomplemento@hotmail.com'));
        return $this->candidateRepo->resetPassword($this->candidateRepo->findUserByEmail('ce.pichardo@gmail.com'));

    }

}