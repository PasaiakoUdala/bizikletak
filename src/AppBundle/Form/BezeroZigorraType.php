<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class BezeroZigorraType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('zigorraHasi',DatetimeType::class, array(
                    'widget' => 'single_text'
                )
            )
            ->add('zigorraAmaitu',DatetimeType::class, array(
                    'widget' => 'single_text'
                )
            )
            ->add('bezeroa')
            ->add('zigorra')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BezeroZigorra'
        ));
    }

}
