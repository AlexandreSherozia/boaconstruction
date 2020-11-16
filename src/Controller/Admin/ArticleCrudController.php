<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\MaterialIcons;
use App\Entity\Text;
use App\Form\TextType;
use App\Repository\MaterialIconsRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\DomCrawler\Field\FormField;
use Vich\UploaderBundle\Form\Type\VichImageType;

class ArticleCrudController extends AbstractCrudController
{

	/**
	 * ArticleCrudController constructor.
	 *
	 * @param MaterialIconsRepository $iconsRepository
	 */
	public function __construct(MaterialIconsRepository $iconsRepository)
	{
	}

	public static function getEntityFqcn(): string
    {
        return Article::class;
    }


    public function configureFields(string $pageName): iterable
    {
	    return [
		    IdField::new('id')->hideOnForm()
			    ->addCssClass('text-large text-bold')
			    ->setCssClass('text-large text-bold'),
		    AssociationField::new('section','dans quelle section placez-vous votre article'),
		    TextField::new('title',"Titre de l'article"),
		    BooleanField::new('isMain',"Est-ce le principal article de la section?"),
		    AssociationField::new('icon','Icônes')
			    ->setFormTypeOption('placeholder', 'Sélectionnez une icône'),
		    CollectionField::new('textContent')
			    ->setEntryType(TextType::class)
			    ->setEntryIsComplex(true)
			    ->allowAdd(true)
			    ->allowDelete(true)
			    ->setFormTypeOption('by_reference',false),
		    ImageField::new('thumbnailFile','Upload an image')->setFormType(VichImageType::class)->hideOnIndex(),
		    ImageField::new('thumbnail','image de fond')->setBasePath('/images/thumbnails')->setRequired(false)->hideOnForm(),
	    ];
    }
}
