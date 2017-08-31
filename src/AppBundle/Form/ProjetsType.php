<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class ProjetsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dateProjet', DateType::class, array(
                    'placeholder' => array(
                    'year' => 'année', 'month' => 'Mois', 'day' => 'Jour',
                )))
                ->add('titreProjet')
                ->add('description', TextareaType::class, array(
                    'label' => 'description',
                    'attr' => array('id' => 'message','class' => 'form_control', 'rows' => '4' , 'cols' => '100')
                ))
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
