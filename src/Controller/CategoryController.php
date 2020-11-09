<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategoryController extends AbstractController
{
	/**
	 * @Route("/", name="home")
	 * @param Request $request
	 *
	 * @return Response
	 */
    public function index(Request $request): Response
    {
        return $this->render('default/index.html.twig', [
        	'routeName' => $request->get('_route'),
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
		]);
	}
}
