<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class GroupeVideosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
                ->add('description', TextareaType::class, array(
                    'label' => 'description',
                    'attr' => array('id' => 'message','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
                ))
                ->add('enregistrer', SubmitType::class, array(
                'attr' => array('class' => 'btn btn-primary')
                ))
            ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\GroupeVideos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_groupeVideos';
    }


}
