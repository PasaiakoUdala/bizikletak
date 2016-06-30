<?php
    /**
     * User: iibarguren
     * Date: 30/06/16
     * Time: 14:18
     */

    namespace AppBundle\Form;
    
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;

    class MatxuraType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options)
        {
            $builder->add('izena');
        }

        public function configureOptions(OptionsResolver $resolver)
        {
            $resolver->setDefaults(array(
                'data_class' => 'AppBundle\Entity\Matxura',
            ));
        }
    }