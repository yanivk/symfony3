<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProjetsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateTexteProjet')
                ->add('titreProjet')
                ->add('description')
                ->add('competences', EntityType::class, array(
                    'class'        => 'AppBundle:competences',
                    'choice_label' => 'nom',
                    'multiple'     => true,
                    'expanded' => true,
                ))
                ->add('imageFile', VichImageType::class, array(
                'label' => 'image',
                'required' => false,
                'allow_delete' => true,
                ))
                ->add('user')
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
            'data_class' => 'AppBundle\Entity\Projets'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_projets';
    }


}
