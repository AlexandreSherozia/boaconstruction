<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Text;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\CrudUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
	    // redirect to some CRUD controller
	    $routeBuilder = $this->get(CrudUrlGenerator::class)->build();

	    return $this->redirect($routeBuilder->setController(CategoryCrudController::class)->generateUrl());

	    // you can also redirect to different pages depending on the current user
	    /*if ('jane' === $this->getUser()->getUsername()) {
		    return $this->redirect('...');
	    }*/

	    // you can also render some template to display a proper Dashboard
	    // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
//	    return $this->render('some/path/my-dashboard.html.twig');
    }
	/**
	 * @Route("/admin/articles", name="admin_articles")
	 */
	public function crudArticles(): Response
	{
		// redirect to some CRUD controller
		$routeBuilder = $this->get(CrudUrlGenerator::class)->build();

		return $this->redirect($routeBuilder->setController(ArticleCrudController::class)->generateUrl());
	}
	/**
	 * @Route("/admin/text-content", name="admin_text_content")
	 */
	/*public function crudText(): Response
	{
		// redirect to some CRUD controller
		$routeBuilder = $this->get(CrudUrlGenerator::class)->build();

		return $this->redirect($routeBuilder->setController(TextCrudController::class)->generateUrl());
	}*/



    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('BOAConstruction Administration');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
         yield MenuItem::linkToCrud('Catégories', 'fa fa-braille', Category::class);
         yield MenuItem::linkToCrud('Articles', 'fa fa-keyboard-o', Article::class);
//         yield MenuItem::linkToCrud('Contenu des textes', 'icon class', Text::class);
    }
}
