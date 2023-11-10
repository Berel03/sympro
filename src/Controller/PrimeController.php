<?php

namespace App\Controller;

use App\Entity\Filter;
use App\Entity\Prime;
use App\Entity\customer;
use App\Form\FilterType;
use App\Form\FPrimeType;
use App\Form\PrimeType;
use App\Repository\FilterRepository;
use App\Repository\FiltreRepository;
use App\Repository\PrimeRepository;
//use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry as PersistenceManagerRegistry;
use Doctrine\Persistence\ObjectManager;
//use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use knp\Component\Pager\PaginatorInterface;
use Symfony\Component\DomCrawler\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class PrimeController extends AbstractController
{
    #[Route('/prime', name: 'prime.index', methods: ['GET','POST'])]
    public function index(PrimeRepository $Repository,Request $request,PersistenceManagerRegistry $doctrine): Response
    {
        $primes =/* $paginator->paginate(*/
            $Repository->findAll();/*,
            $request->query->getInt('page',1),
            10
        );*/
        //$prime = new Prime();
        $filtre = new Prime();
        $form1 = $this->createForm(FPrimeType::class, $filtre);
        $form1 ->handleRequest($request);
        if ($form1->isSubmitted() /*&& $form1->isValid()*/) {
            //$prime = $form1->getData();

            if(($form1->getData()->getContrat() != null) &&($form1->getData()->getClient() != null) && ($form1->getData()->getCompagnieAssurance() != null)){
                $Contra = $form1->getData()->getContrat();
                $cli = $form1->getData()->getClient();
                $comp = $form1->getData()->getCompagnieAssurance(); 
                
                $primes = $Repository->findBy(
                    ['Contrat'=> $Contra,'Client'=> $cli,'CompagnieAssurance'=> $comp],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() != null) &&($form1->getData()->getClient() != null) && ($form1->getData()->getCompagnieAssurance() == null)) {
                $Contra = $form1->getData()->getContrat();
                $cli = $form1->getData()->getClient(); 
                
                $primes = $Repository->findBy(
                    ['Client'=> $cli,'Contrat'=> $Contra],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() == null) &&($form1->getData()->getClient() != null) && ($form1->getData()->getCompagnieAssurance() != null)) {
                $cli = $form1->getData()->getClient();
                $comp = $form1->getData()->getCompagnieAssurance(); 
                
                $primes = $Repository->findBy(
                    ['Client'=> $cli,'CompagnieAssurance'=> $comp],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() != null) &&($form1->getData()->getClient() == null) && ($form1->getData()->getCompagnieAssurance() != null)) {
                $Contra = $form1->getData()->getContrat();
                $comp = $form1->getData()->getCompagnieAssurance(); 
                
                $primes = $Repository->findBy(
                    ['Contrat'=> $Contra,'CompagnieAssurance'=> $comp],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() != null) &&($form1->getData()->getClient() == null) && ($form1->getData()->getCompagnieAssurance() == null)) {
                $Contra = $form1->getData()->getContrat(); 
                
                $primes = $Repository->findBy(
                    ['Contrat'=> $Contra],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() == null) &&($form1->getData()->getClient() != null) && ($form1->getData()->getCompagnieAssurance() == null)) {
                $cli = $form1->getData()->getClient();
                
                $primes = $Repository->findBy(
                    ['Client'=> $cli],
                    ['id'=> 'ASC']
                );
            }elseif (($form1->getData()->getContrat() == null) &&($form1->getData()->getClient() == null) && ($form1->getData()->getCompagnieAssurance() != null)) {
                $comp = $form1->getData()->getCompagnieAssurance(); 
                
                $primes = $Repository->findBy(
                    ['CompagnieAssurance'=> $comp],
                    ['id'=> 'ASC']
                );
            }else{
                return $this->redirectToRoute('prime.index');
            }
            //dd($primes);
            //return $this->redirectToRoute('prime.filtre');

        }

        return $this->render('Pages/prime/index.html.twig', [ 
            'prime'=> $primes,'form1'=>$form1->createView()
        ]);
    }

    #[Route('/prime/nouveau', name:'prime.new', methods: ['GET','POST'])]
    public function new(Request $request, /*EntityManager */ PersistenceManagerRegistry $doctrine): Response
    {
        $prime = new Prime();
        $form = $this->createForm(PrimeType::class, $prime);
        $form ->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $prime = $form->getData();
            
            $entityManager = $doctrine->getManager();
            $entityManager ->persist($prime);
            $entityManager ->flush();

            $this->addFlash('success','Prime créer avec succès ! ');

            return $this->redirectToRoute('prime.index');

        }
        return $this->render('Pages/Prime/new.html.twig',[
            'form' => $form->createView(),
        ]);
    }
}
