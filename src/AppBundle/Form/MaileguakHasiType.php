<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class MaileguakHasiType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('fetxa_hasi',DatetimeType::class, array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd  HH:mm'
                )
            )
            ->add('erabilera')
            ->add('bezeroa')
            ->add('guneahasi')
            ->add('bizikleta')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Maileguak'
        ));
    }
}