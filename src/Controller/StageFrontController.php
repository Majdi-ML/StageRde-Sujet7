<?php

namespace App\Controller;

use App\Entity\Post;
use App\Entity\Demande;
use App\Form\PostType;
use App\Form\DemandeType;
use App\Repository\DemandeRepository;
use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Security;

#[Route('/stagepost')]
class StageFrontController extends AbstractController
{
    #[Route('/search', name: 'stage_search')]
    public function search(Request $request, PostRepository $postRepository): Response
    {
        $query = $request->query->get('q');
        $posts = $postRepository->findByType($query);

        return $this->render('stagefront/search.html.twig', [
            'posts' => $posts,
            'query' => $query,
        ]);
    }
    #[Route('/', name: 'posts', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager,Request $request, PostRepository $postRepository): Response
    {
        $posts = $entityManager
            ->getRepository(Post::class)
            ->findAll();
            $query = $request->query->get('q');
            $posts = $postRepository->findByType($query);
            foreach ($posts as $key => $post) {
                if ($post->getType() == "offre d emploi") {
                    unset($posts[$key]);
                }
               
            }
          
        return $this->render('stagefront/index.html.twig', [
            'posts' => $posts,
            'query' => $query,
        ]);
    }

    #[Route('/{id}', name: 'app_post_show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        return $this->render('stagefront/show.html.twig', [
            'post' => $post,
        ]);
    }


    #[Route('/{id}/postuler', name: 'app_postulation_stage_postuler', methods: ['GET', 'POST'])]
    public function Postuler(Security $security,Request $request, DemandeRepository $demandeRepository, UserRepository $userRepository, Post $post): Response
    {
       // $user = $security->getUser();

        $demande = new Demande();
        $user = $userRepository->find(21); //ca sera changé 
        $form = $this->createForm(DemandeType::class, $demande);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            
            
            $demande->setUsers($user);
            $demande->setDemandes($post);

            $file = $request->files->get('demande')['cv'];
            $uploads_directory = $this->getParameter('uploads_directory');
            $filename = md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($uploads_directory, $filename);
            $demande->setCv($filename);
           /* $entityManager->persist($demande);
            $entityManager->flush();*/

            $demandeRepository->save($demande, true);
    
            $this->addFlash('notice','Votre candidature a été envoyée avec succés!');
    
            return $this->redirectToRoute('posts', [], Response::HTTP_SEE_OTHER);
        }
    
        return $this->renderForm('demande/new.html.twig', [
            'demande' => $demande,
            'form' => $form,
            'post' => $post
        ]);
    }
   
}
