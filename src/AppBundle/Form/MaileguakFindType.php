<?php

namespace AppBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaileguakFindType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('guneahasi',null, array('label' => 'form.name','required' => false, 'placeholder' => 'Aukeratu gunea'))
            ->add('guneaamaitu',null, array('label' => 'form.name','required' => false, 'placeholder' => 'Aukeratu gunea'))
            ->add('bezeroa', EntityType::class, array(
                'class' => 'AppBundle:Bezeroa',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->where('b.alokatua <> 1 or b.alokatua is NULL')
                        ->orderBy('b.izena', 'ASC');
                },
                'required' => false,
                'placeholder' => 'Aukeratu Bezeroa'
            ))
            ->add('bizikleta', EntityType::class, array(
                'class' => 'AppBundle:Bizikleta',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->where('b.alokatua <> 1 or b.alokatua is NULL')
                        ->orderBy('b.kodea', 'ASC');
                },
                'required' => false,
                'placeholder' => 'Aukeratu Bizikleta'
            ))

            ->add('fetxa_hasi',DatetimeType::class, array(
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd  HH:mm','required' => false
            ))
            ->add('fetxa_amaitu',DatetimeType::class, array(
                    'widget' => 'single_text',
                    'format' => 'yyyy-MM-dd  HH:mm','required' => false
                )
            )
            ->add('ibilbidea',null, array('label' => 'form.name','required' => false, 'placeholder' => 'Aukeratu ibilbidea'))
            ->add('eguraldia',null, array('label' => 'form.name','required' => false, 'placeholder' => 'Aukeratu Eguraldia'))



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
