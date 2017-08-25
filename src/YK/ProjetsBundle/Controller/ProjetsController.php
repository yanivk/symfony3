<?php

namespace YK\ProjetsBundle\Controller;

use AppBundle\Entity\Projets;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProjetsController extends Controller
{
    public function indexAction()
    {
        return $this->render('YKProjetsBundle:Default:index.html.twig');
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
                $projet = new Projets();

                // On crée le FormBuilder grâce au service form factory
                // On ajoute les champs de l'entité que l'on veut à notre formulaire
                $form = $this->createForm(\AppBundle\Form\ProjetsType::class, $projet);

                // Si la requête est en POST
                if ($request->isMethod('POST')) {
                  // On fait le lien Requête <-> Formulaire
                  // À partir de maintenant, la variable $form contient les valeurs entrées dans le formulaire par le visiteur
                  $form->handleRequest($request);

                  // On vérifie que les valeurs entrées sont correctes
                  if ($form->isSubmitted() && $form->isValid()) {
                    // On enregistre notre objet $form dans la base de données.
                    $em = $this->getDoctrine()->getManager();
                    $em->persist($projet);
                    $em->flush();

                    $request->getSession()->getFlashBag()->add('notice', 'Projet bien enregistrée.');

                    // On redirige vers la page de visualisation de l'entreprise nouvellement créée
                    return $this->redirectToRoute('yk_competences_homepage');
                   }
                }

                // À partir du formBuilder, on génère le formulaire

                // On passe la méthode createView() du formulaire à la vue
                // afin qu'elle puisse afficher le formulaire toute seule
                return $this->render('YKProjetsBundle:Default:creationProjet.html.twig', array(
                  'form' => $form->createView(),
                ));
            /*}*/

    }

    public function showAllAction(){
    $projet = $this
    ->getDoctrine()
    ->getRepository('AppBundle:Projets')
    ->findAll()
    ;

    if (!$projet){
        throw $this->createNotFoundException('Aucun projet n\'existe');
    }

    return $this->render('YKProjetsBundle:Default:listeProjets.html.twig',
            array('projet'  => $projet ));
    }

    public function showAction($id){
        $projet = $this
        ->getDoctrine()
        ->getRepository('AppBundle:Projets')
        ->find($id)
        ;

        if (!$projet){
            throw $this->createNotFoundException('Aucun projet ne correspond a cette id');
        }

        return $this->render('YKProjetsBundle:Default:index.html.twig',
                array('projet'  => $projet ));
    }
}
