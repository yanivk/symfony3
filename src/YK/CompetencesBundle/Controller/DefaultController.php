<?php

namespace YK\CompetencesBundle\Controller;

use AppBundle\Entity\Competences;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKCompetencesBundle:Default:index.html.twig');
    }
    
    public function addAction(Request $request){
    
        /*if (!$this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            $this->addFlash(
            'notice',
            'Vous n\'avez pas les droits pour ajouter une competence!'
            );
            return $this->redirectToRoute('yk_competences_homepage');
        }else
            {*/    
                $competence = new Competences();

                // On crée le FormBuilder grâce au service form factory
                // On ajoute les champs de l'entité que l'on veut à notre formulaire
                $form = $this->createForm(\AppBundle\Form\CompetencesType::class, $competence);

                // Si la requête est en POST
                if ($request->isMethod('POST')) {
                  // On fait le lien Requête <-> Formulaire
                  // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
                  $form->handleRequest($request);

                  // On vérifie que les valeurs entrées sont correctes
                  if ($form->isSubmitted() && $form->isValid()) {
                    // On enregistre notre objet $form dans la base de données.
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($competence);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Competences bien enregistrée.');

                    // On redirige vers la page de visualisation de l'entreprise nouvellement créée
                    return $this->redirectToRoute('yk_competences_homepage');
                   }
                }

                // À partir du formBuilder, on génère le formulaire

                // On passe la méthode createView() du formulaire à la vue
                // afin qu'elle puisse afficher le formulaire toute seule
                return $this->render('YKCompetencesBundle:Default:creationCompetence.html.twig', array(
                  'form' => $form->createView(),
                ));
            /*}*/
        
    }
    
    public function showAllAction(){
    $competences = $this
    ->getDoctrine()
    ->getRepository('AppBundle:Competences')
    ->findAll()
    ;

    if (!$competences){
        throw $this->createNotFoundException('Aucune competences n\'existe');
    }

    return $this->render('YKCompetencesBundle:Default:listeCompetences.html.twig', 
            array('competences'  => $competences ));
    }
    
    public function showAction($id){
        $competences = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Competences')
        ->find($id)
        ;
        
        if (!$competences){
            throw $this->createNotFoundException('Aucune competences ne correspond a cette id');
        }
        
        return $this->render('YKCompetencesBundle:Default:index.html.twig', 
                array('competences'  => $competences ));
    }
    
}
