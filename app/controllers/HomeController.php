<?php

use HireMe\Repositories\CandidateRepo;
use Billing\Repositories\ItbisRepo;
use Commons\Repositories\ConfigRepo;
use Billing\Repositories\NcfSequencyRepo;
use Billing\Repositories\NcfTypeRepo;
use Billing\Repositories\NcfRepo;
use HireMe\Repositories\ClientRepo;


class HomeController extends AssetsController
{
	//Injection de Dependencias
	protected $candidateRepo;
	protected $itbisRepo;
	protected $configRepo;
	protected $ncfSequencyRepo;
	protected $ncfRepo;
	protected $clientRepo;


	public function __construct(CandidateRepo $candidateRepo,
								ItbisRepo $itbisRepo,
								ConfigRepo $configRepo,
								NcfSequencyRepo $ncfSequencyRepo,
								NcfRepo $ncfRepo,
								ClientRepo $clientRepo
								)
	{
		$this->candidateRepo 	= $candidateRepo;
		$this->itbisRepo 		= $itbisRepo;
		$this->configRepo 		= $configRepo;
		$this->ncfSequencyRepo	= $ncfSequencyRepo;
		$this->ncfRepo			= $ncfRepo;
		$this->clientRepo	    = $clientRepo;
	}

	public function index()
	{
		$latest_candidates = $this->candidateRepo->findLastest();
		return View::make('home',compact('latest_candidates'));
//		return View::make('themes/melon/tpls/login');
	}
	public function config()
	{
		if(Auth::check())
		{
			return Response::json(
				[
					'itbis_generals' => json_decode($this->configRepo->getValueByAlias('itbis')),
					'itbis' => json_decode($this->itbisRepo->all()),
//					'ncf'	=> json_decode($this->ncfSequencyRepo->getNext(Auth::User()->location_id))
					'ncf'	=> json_encode(['sequency'=>"10001010"])
				]);
		}
	}

	public function getNcf()
	{
		if(Auth::check())
		{
			return $this->ncfSequencyRepo->getNext(1);
		}
	}

	public function test()
	{
//		return $this->ncfRepo->getTypesByLocationId(2);
		return $this->getProductsData();
	}
}
