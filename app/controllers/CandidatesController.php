<?php

use HireMe\Repositories\CategoryRepo;
use HireMe\Repositories\CandidateRepo;

class CandidatesController extends BaseController
{
	protected $categoryRepo;
	protected $candidateRepo;

	public function __construct(CategoryRepo $categoryRepo,CandidateRepo $candidateRepo)
	{
		$this->categoryRepo = $categoryRepo;
		$this->candidateRepo = $candidateRepo;
	}

	public function category($slug,$id)
	{
		//Se va remover Category si no que se debe usar el Repo de Category
		$category = $this->categoryRepo->find($id);
		//Ahora pertenece a namespace
		return View::make('candidates/category',compact('category'));
	}
	/**
	 * Presenta un Candidato
	*/
	public function show($slug,$id)
	{
		$candidate = $this->candidateRepo->find($id);
		dd($slug,$id);
	}

}
