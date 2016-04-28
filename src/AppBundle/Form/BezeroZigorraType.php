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
            ->add('zigorraHasi','dateTimePicker')
            ->add('zigorraAmaitu')
            ->add('mailegua')
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

//    protected function configureFormFields(FormMapper $formMapper)
//    {
//        $formMapper
//            ->add('zigorraHasi', 'dateTimePicker' )
//            ->add('zigorraAmaitu', 'dateTimePicker' )
//        ;
//    }
}
