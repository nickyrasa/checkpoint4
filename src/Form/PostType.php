<?php

namespace App\Form;

use App\Entity\Player;
use App\Entity\Post;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('postTitle', TextType::class, [
                'label' => 'Veuillez entrer le titre de votre post',
            ])
            ->add('description', TextType::class, [
                'label' => 'Veuillez entrer une description',
            ])
            ->add('pictureFile', VichFileType::class, [
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'download_uri' => true, // not mandatory, default is true
            ])
            ->add('details', TextareaType::class, [
                'label' => 'Veuillez entrer un résumé',
            ])
            ->add('postedBy', EntityType::class, [
                'class' => Player::class,
                'choice_label' => 'pseudo',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
