<?php

use HireMe\Repositories\CandidateRepo;
use Billing\Repositories\ItbisRepo;
use Commons\Repositories\ConfigRepo;

class HomeController extends BaseController
{

	//Injection de Dependencias
	protected $candidateRepo;
	protected $itbisRepo;
	protected $configRepo;

	public function __construct(CandidateRepo $candidateRepo,ItbisRepo $itbisRepo,ConfigRepo $configRepo)
	{
		$this->candidateRepo 	= $candidateRepo;
		$this->itbisRepo 		= $itbisRepo;
		$this->configRepo 		= $configRepo;
	}

	public function index()
	{
		$latest_candidates = $this->candidateRepo->findLastest();

		return View::make('home',compact('latest_candidates'));
//		return View::make('themes/melon/tpls/login');
	}
	public function config()
	{
		return Response::json(['itbis_generals'=>json_decode($this->configRepo->getValueByAlias('itbis')),'itbis'=>json_decode($this->itbisRepo->all())]);
	}
}
