<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route(path: '/main1', name: 'homepage', methods:['GET'])]
    public function index(): Response
    {
       // return $this->render('main/index.html.twig', [
          //  'controller_name' => 'MainController',
        // ]);
        return new Response("Hello word");
    }

    //127.0.0.1:8000/product/12
    #[Route(path: '/product/{cat}', name: 'categorize', methods:['GET'])]
    public function showCat(int $cat): Response
    {
        return new Response("Displaying products by CatID".$cat);
    }

    //127.0.0.1:8000/product/13
    #[Route(path: '/login/{user}', name: 'login', methods:['GET'])]
    public function login (string $user): Response
    {
        return new Response("Displaying products by CatID".$user);
    }

      //127.0.0.1:8000/blog/music/page/100
      #[Route(path: '/blog/{kind}/page/{pnum}', name: 'blog', methods:['GET'], requirements:['kind' => 'vpop|kpop'])]
      //requirements:['pnum' => '\d+'] quy định biểu thức chính quy
      public function showBlogbyPage (int $pnum=1, string $kind =''): Response
      {
          return new Response("$kind in $pnum");
      }


      //127.0.0.1:8000/comment?id=1&keyword=data
    #[Route(path: '/comment', name: 'comment', methods:['GET'])]
    public function showCmt(Request $req): Response
    {
        //if user request is  "?" =>GET
        $id = $req->query->get('id');
        $keyword = $req->query->get('keyword');

        //if user send the data from a From by method Post.
        //$req->request->get('id);
        return new Response("Displaying comment by ID=$id and key = $keyword");
    }

    //127.0.0.1:8000/goto
    #[Route(path: '/goto', name: 'goToBlog', methods:['GET'])]
    public function redirectBlog(): Response
    {
        //
        return $this->redirectToRoute('categorize', ['cat'=>12]);
    }

}
