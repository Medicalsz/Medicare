<?php

namespace App\Form;

use App\Entity\ForumTopic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Url;

class ForumTopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type de sujet',
                'choices' => [
                    'Article' => ForumTopic::TYPE_TEXT,
                    'Video medicale' => ForumTopic::TYPE_VIDEO,
                ],
                'expanded' => true,
            ])
            ->add('title', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('content', TextareaType::class, [
                'label' => 'Description / Contenu',
                'attr' => ['rows' => 6],
            ])
            ->add('videoUrl', TextType::class, [
                'label' => 'URL video',
                'required' => false,
                'constraints' => [
                    new Url(['message' => 'Veuillez saisir une URL video valide.']),
                ],
                'attr' => [
                    'placeholder' => 'https://www.youtube.com/watch?v=... ou https://.../video.mp4',
                ],
            ]);

        $builder->addEventListener(FormEvents::POST_SUBMIT, function (FormEvent $event): void {
            $topic = $event->getData();
            $form = $event->getForm();
            if (!$topic instanceof ForumTopic) {
                return;
            }

            if ($topic->isVideoType() && trim((string) $topic->getVideoUrl()) === '') {
                $form->get('videoUrl')->addError(new FormError('L\'URL video est obligatoire pour un sujet video.'));
            }
        });
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ForumTopic::class,
        ]);
    }
}
