<?php
    /**
     * User: iibarguren
     * Date: 4/08/16
     * Time: 14:31
     */

    namespace AppBundle\Form\Type\Configurator;


    use JavierEguiluz\Bundle\EasyAdminBundle\Form\Type\Configurator\TypeConfiguratorInterface;
    use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
    use Symfony\Component\Form\FormConfigInterface;

    class DateTimeConfigurator implements TypeConfiguratorInterface
    {
        /**
         * {@inheritdoc}
         */
        public function configure($name, array $options, array $metadata, FormConfigInterface $parentConfig)
        {
            $options['widget'] = 'single_text';
            $options['format'] = 'dd/MM/yyyy';

            return $options;
        }

        /**
         * {@inheritdoc}
         */
        public function supports($type, array $options, array $metadata)
        {
            return in_array($type, array(DateTimeType::class, 'datetime'));
        }
    }