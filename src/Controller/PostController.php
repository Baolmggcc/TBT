<?php

namespace App\Controller;
use App\Entity\Post;
use App\Form\PostForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class PostController extends AbstractController
{
    

    #[Route('/post', name: 'id')]
    public function postId(): Response
    {
        $post = new Post();
        $post->setId("1");
        $post->setTitle("Thinh");
        $post->setContent(0);
        return $this->render('post/index.html.twig', [
            'post' => $post
        ]);
    }

    #[Route('/addpost', name: 'post_add')]
    public function addPostAction(Request $req, SluggerInterface $slugger): Response
    {
       $post = new Post();
       $postForm = $this-> createForm(PostForm::class,$post);
       $postForm->handleRequest($req,);
       if ($postForm-> isSubmitted() && $postForm-> isValid())
       {
        // get all data from form
        $data = $postForm->getData();
        //get any field as you walnt 
        $title= $data->getTitle();
        $created= $data->getCreated();
        $imgFile= $data->getImage();
        if ($imgFile) {
            $originalFilename = pathinfo($imgFile->getClientOriginalName(), PATHINFO_FILENAME);
    //  SluggerInterface $slugger
    $safeFilename = $slugger->slug($originalFilename);
    $newFilename = $safeFilename.'-'.uniqid().'.'.$imgFile->guessExtension();
    // Move the file to the directory where brochures are stored
    try {
        $imgFile->move(
            $this->getParameter('image_dir'),
            $newFilename
        );
    } catch (FileException $e) {
        echo $e;
    }
    // $post->setImage($newFilename);
}
        //...
        if($created == null){
            $created= new \DateTime();
        }
        $newtime=$created->format('d-m-Y');
        // return view
        return $this->render('post/s.html.twig', [
            'title' => $title,
            'newtime'=> $newtime,
            'image' => $newFilename
          ]);
       }
        return $this->render('post/post.html.twig', [
          'post_form'=> $postForm->createView()
        ]);
    }
    
}
