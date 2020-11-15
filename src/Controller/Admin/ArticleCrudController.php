<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Text;
use App\Form\TextType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\FormField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title',"Titre de l'article"),
            BooleanField::new('isMain',"Esc-ce que cet article est principal?"),
            TextField::new('materialIcon'),
	        CollectionField::new('textContent')
		        ->setEntryType(TextType::class)
		        ->allowAdd(true)
		        ->allowDelete(true)
	        ->setFormTypeOption('by_reference',false),
        ];
    }

}
