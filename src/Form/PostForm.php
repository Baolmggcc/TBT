<?php
namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class PostForm extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('title',TextType::class,[
            'required'=>true
        ])
        
        ->add('image',FileType::class,[
            'required' => false,
            'label' => 'Insert an image'
        ])
        
        ->add('content',TextType::class,[
            'required'=>false
        ])

        ->add('created',DateTimeType::class,[
            'widget'=>'single_text'
        ])

        ->add('save',SubmitType::class,[
            'label'=> 'Add a new post'
        ])
        ;
    }  
}
?>