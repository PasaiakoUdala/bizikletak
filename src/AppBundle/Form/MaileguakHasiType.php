<?php

namespace AppBundle\Form;

use AppBundle\Entity\Matxura;
use AppBundle\Form\MatxuraType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MaileguakHasiType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('bezeroa',null, array('label' => 'form.name','required' => true, 'placeholder' => 'Aukeratu Bezeroa'))
            ->add('bezeroa', EntityType::class, array(
                'class' => 'AppBundle:Bezeroa',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('b')
                        ->where('b.alokatua <> 1 or b.alokatua is NULL')
                        ->orderBy('b.izena', 'ASC');
                },
                'required' => true,
                'placeholder' => 'Aukeratu Bezeroa'
            ))
            ->add('guneahasi',null, array('label' => 'form.name','required' => true, 'placeholder' => 'Aukeratu gunea'))
            ->add('bizikleta', EntityType::class, array(
                    'class' => 'AppBundle:Bizikleta',
                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('b')
                            ->where('b.alokatua <> 1 or b.alokatua is NULL')
                            ->orderBy('b.kodea', 'ASC');
                    },
                    'required' => true,
                    'placeholder' => 'Aukeratu Bizikleta'
            ))
            ->add('fetxa_hasi',DatetimeType::class, array('widget' => 'single_text'))
            ->add('erabilera')

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
