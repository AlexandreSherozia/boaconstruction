<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
	/**
	 * @var CategoryRepository
	 */
	private $categoryRepository;

	/**
	 * CategoryController constructor.
	 *
	 * @param CategoryRepository $categoryRepository
	 */
	public function __construct(CategoryRepository $categoryRepository)
	{
		$this->categoryRepository = $categoryRepository;
	}


	/**
	 * @Route("/", name="home")
	 * @param Request            $request
	 *
	 * @return Response
	 */
    public function index(Request $request): Response
    {
		$routeName =$request->get('_route');

	    return $this->render('default/index.html.twig', [
        	'routeName' => $routeName,
	        'categories' => $this->categoryRepository->findAll(),
		    'category' => $this->categoryRepository->findOneBy(['routeName'=>$routeName])
        ]);
    }

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/qui-sommes-nous", name="qui_sommes_nous")
	 */
    public function showWhoWeAre(Request $request): Response
    {
    	return $this->render('about-us.html.twig', [
		    'routeName' => $request->get('_route'),
		    'categories' => $this->categoryRepository->findAll(),
	    ]);
    }

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services", name="nos_services")
	 */
	public function showOurServices(Request $request): Response
	{
		return $this->render('nos-services.html.twig', [
			'routeName' => $request->get('_route'),
			'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-realisations", name="nos_realisations")
	 */
	public function showOurWorks(Request $request): Response
	{
		return $this->render('our-works.hrml.twig', [
			'routeName' => $request->get('_route'),
			'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services/construction", name="construction")
	 */
	public function showConstruction(Request $request): Response
	{
		return $this->render('sub_categories.html.twig', [
			'routeName' => $request->get('_route'),
			'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services/renovation", name="renovation")
	 */
	public function showRenovation(Request $request): Response
	{
		return $this->render('our-works.hrml.twig', [
			'routeName' => $request->get('_route'),
			'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services/electricite", name="electricite")
	 */
	public function showElectricity(Request $request): Response
	{
		return $this->render('our-works.hrml.twig', [
			'routeName' => $request->get('_route'),
			'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services/plomberie", name="plomberie")
	 */
	public function showPlomberie(Request $request): Response
	{
		return $this->render('our-works.hrml.twig', [
			'routeName' => $request->get('_route'),
	        'categories' => $this->categoryRepository->findAll(),
		]);
	}

	/**
	 * @param Request $request
	 *
	 * @return Response
	 * @Route("/nos-services/peinture", name="peinture")
	 */
	public function showPeinture(Request $request): Response
	{
		return $this->render('our-works.hrml.twig', [
			'routeName' => $request->get('_route'),
	        'categories' => $this->categoryRepository->findAll(),
		]);
	}
}
