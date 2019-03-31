<?php

namespace App\Controller;

use App\Entity\Boite;
use App\Entity\Aliment;
use App\Entity\Produit;
use App\Entity\Recette;
use App\Form\BoiteType;
use App\Entity\Stockage;
use App\Form\AlimentType;
use App\Form\ProduitType;
use App\Form\RecetteType;
use App\Form\StockageType;
use App\Entity\TypeAliment;
use App\Form\TypeAlimentType;
use App\Repository\BoiteRepository;
use App\Repository\AlimentRepository;
use App\Repository\ProduitRepository;
use App\Repository\StockageRepository;
use App\Repository\TypeAlimentRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CuisineController extends AbstractController
{
    /**
     * @Route("/cuisine", name="cuisine")
     */
    public function index()
    {
        return $this->render('cuisine/index.html.twig', [
            'controller_name' => 'CuisineController',
        ]);
    }

    /**
     * Affiche l'ensemble des boites disponibles
     * 
     * @Route("/{format}/cuisine/boites", defaults={"format"="web"}, name="liste_boites")
     *
     * @return Response
     */
    public function listingBoites(BoiteRepository $repo, $format) {

        $boites = $repo->findAll();

        return $this->render('cuisine/boites.html.twig', [
            'titre' => 'Listing des boites',
            'boites' => $boites,
            'format' => $format
        ]);
    }

    /**
     * Création d'une boite vide
     * 
     * @Route("/{format}/cuisine/boite/new",  defaults={"format"="web"}, name="new_boite")
     *
     * @return Response
     */
    public function creerBoite(Request $request, ObjectManager $manager, $format) {
        $boite = new Boite();

        $form = $this->createForm(BoiteType::class, $boite);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($boite);
            $manager->flush();
            $this->addFlash(
                'success',
                "La boite : <strong>{$boite->getNom()}</strong> a bien été créer !"
            );

            return $this->redirectToRoute('liste_boites');
        }

        return $this->render('cuisine/nouvelleboite.html.twig', [
            'form' => $form->createView(),
            'format' => $format
        ]);
    }

    /**
     * Remplir une boite avec un repas
     *
     * @Route("/cuisine/boite/add/{id}", name="remplir_boite")
     * 
     * @return Response
     */
    public function remplirBoite(Boite $boite, Request $request, ObjectManager $manager) {
        $form = $this->createForm(BoiteType::class, $boite);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($boite);
            $manager->flush();
            $this->addFlash(
                'success',
                "La boite <strong>{$boite->getNom()}</strong> a bien été remplie !"
            );
            return $this->redirectToRoute('liste_boites');
        }

        return $this->render('cuisine/remplirboite.html.twig', [
            'boite' => $boite,
            'form' => $form->createView()
        ]);
    }

    /**
     * Création d'une type d'aliment
     * 
     * @Route("/{format}/cuisine/typealiment/new", defaults={"format"="web"}, name="new_typealiment")
     *
     * @return Response
     */
    public function creerTypeAliment(Request $request, ObjectManager $manager) {
        $element = new TypeAliment();
        $class = TypeAlimentType::class;
        $pagedebase = 'cuisine/nouveauelement.html.twig';
        $pagederesultat = 'liste_typealiment';
        $titre = "Création d'un type d'aliment";
        return $this->creerElement($format, $element, $request, $manager, $class, $pagedebase, $pagederesultat, $titre);
    }

    /**
     * Affiche l'ensemble des types d'aliment
     * 
     * @Route("/{format}/cuisine/typealiment", defaults={"format"="web"}, name="liste_typealiment")
     *
     * @return Response
     */
    public function listingTypesAliment($format, TypeAlimentRepository $repo) {

        $typesAliment = $repo->findAll();

        return $this->render('cuisine/typealiment.html.twig', [
            'titre' => 'Listing des types d\'aliment',
            'typesAliment' => $typesAliment,
            'format' => $format
        ]);
    }

    /**
     * Création d'un aliment
     * 
     * @Route("/cuisine/aliment/new", name="new_aliment")
     *
     * @return Response
     */
    public function creerAliment(Request $request, ObjectManager $manager) {
        $element = new Aliment();
        $class = AlimentType::class;
        $pagedebase = 'cuisine/nouveauelement.html.twig';
        $pagederesultat = 'liste_aliment';
        $titre = "Création d'un aliment";
        return $this->creerElement($element, $request, $manager, $class, $pagedebase, $pagederesultat, $titre);
    }

    /**
     * Affiche l'ensemble des aliments
     * 
     * @Route("/cuisine/aliment", name="liste_aliment")
     *
     * @return Response
     */
    public function listingAliments(AlimentRepository $repo) {

        $aliments = $repo->findAll();

        return $this->render('cuisine/aliment.html.twig', [
            'titre' => 'Listing des aliments',
            'aliments' => $aliments
        ]);
    }

    /**
     * Création d'un stockage
     * 
     * @Route("/cuisine/stockage/new", name="new_stockage")
     *
     * @return Response
     */
    public function creerStockage(Request $request, ObjectManager $manager) {
        $element = new Stockage();
        $class = StockageType::class;
        $pagedebase = 'cuisine/nouveauelement.html.twig';
        $pagederesultat = 'liste_stockage';
        $titre = "Création d'un stockage";
        return $this->creerElement($element, $request, $manager, $class, $pagedebase, $pagederesultat, $titre);
    }

    /**
     * Affiche l'ensemble des aliments
     * 
     * @Route("/cuisine/stockage", name="liste_stockage")
     *
     * @return Response
     */
    public function listingStockage(StockageRepository $repo) {

        $stockages = $repo->findAll();

        return $this->render('cuisine/stockage.html.twig', [
            'titre' => 'Listing des stockages',
            'stockages' => $stockages
        ]);
    }

    /**
     * Création d'un produit
     * 
     * @Route("/cuisine/produit/new", name="new_produit")
     *
     * @return Response
     */
    public function creerProduit(Request $request, ObjectManager $manager) {
        $element = new Produit();
        $class = ProduitType::class;
        $pagedebase = 'cuisine/nouveauelement.html.twig';
        $pagederesultat = 'liste_stockage';
        $titre = "Création d'un produit";
        return $this->creerElement($element, $request, $manager, $class, $pagedebase, $pagederesultat, $titre);
    }

    /**
     * Affiche l'ensemble des produits
     * 
     * @Route("/cuisine/produit", name="liste_produit")
     *
     * @return Response
     */
    public function listingProduit(ProduitRepository $repo) {

        $produits = $repo->findAll();

        return $this->render('cuisine/produit.html.twig', [
            'titre' => 'Listing des produits',
            'produits' => $produits
        ]);
    }

    /**
     * Création d'une recette
     * 
     * @Route("/cuisine/recette/new", name="new_recette")
     *
     * @return Response
     */
    public function creerRecette(Request $request, ObjectManager $manager) {
        $element = new Recette();
        $class = RecetteType::class;
        $pagedebase = 'cuisine/nouvellerecette.html.twig';
        $pagederesultat = 'liste_stockage';
        $titre = "Création d'une recette";

        $form = $this->createForm($class, $element);        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            foreach($element->getIngredients() as $ingredient) {
                $ingredient->setRecette($element);
                $manager->persist($ingredient);
            }
            foreach($element->getEtapes() as $etape) {
                $etape->setRecette($element);
                $manager->persist($etape);
            }
            $manager->persist($element);
            $manager->flush();
            $this->addFlash(
                'success',
                "L'élément : <strong>{$element->getNom()}</strong> a bien été créé !"
            );
            //Affichage de la liste des elements apres l'ajout du nouveau
            return $this->redirectToRoute($pagederesultat);
        }
        //Affichage de la page avec le formulaire
        return $this->render($pagedebase, [
            'form' => $form->createView(),
            'titre' => $titre
        ]);
    }

    /**
     * Création d'un formulaire pour un nouveau element (objet entity)
     * @return Response
     */
    private function creerElement($format, $element, $request, $manager, $class, $pagedebase, $pagederesultat, $titre){
        $form = $this->createForm($class, $element);        
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($element);
            $manager->flush();
            $this->addFlash(
                'success',
                "L'élément : <strong>{$element->getNom()}</strong> a bien été créé !"
            );
            //Affichage de la liste des elements apres l'ajout du nouveau
            return $this->redirectToRoute($pagederesultat);
        }
        //Affichage de la page avec le formulaire
        return $this->render($pagedebase, [
            'form' => $form->createView(),
            'titre' => $titre,
            'format' => $format
        ]);
    }
}
