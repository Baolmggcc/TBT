<?php

namespace App\Controller;

use App\Entity\Student;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemController extends AbstractController
{
    #[Route('/social', name: 'socialPg')]
    public function index(): Response
    {
        return $this->render('tem/index.html.twig', [
            'controller_name' => 'TemController',
            'action_name'=>'indexpage'
        ]);
    }

    #[Route('/showstd', name: 'showstd')]
    public function showStdAction(): Response
    {
        $student = new Student();
        $student->setId("GCC100");
        $student->setFName("Thinh");
        $student->setGender(0);
        return $this->render('tem/student.html.twig', [
            'student' => $student
        ]);
    }

    //127.0.0.1:8000/admin
    #[Route(path:'/showstd2/{role}', name:'categorize', methods:['GET'], requirements:['role' => 'admin|user'])]
    public function showBlog(string $role): Response
    {
        $std = array();
        for( $i=0; $i<3; $i++){
            $s = new Student();
            $s->setId($i);
            $s->setFName(sprintf("Student %d", $i));
            $s->setGender(sprintf("%d", random_int(0,1)));
            $std[] = $s;
        }
        return $this->render('tem/student2.html.twig', [
            'role'=>$role, 'std' =>$std
        ]);
    }
}
