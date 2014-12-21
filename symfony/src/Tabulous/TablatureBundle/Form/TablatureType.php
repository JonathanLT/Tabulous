<?php

namespace Tabulous\TablatureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TablatureType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nommusique')
            ->add('album')
            ->add('accordage')
            ->add('date')
            ->add('derniereconsultation')
            ->add('moyenne')
            ->add('format')
            ->add('niveau')
            ->add('adressefichier')
            ->add('cumulnote')
            ->add('nbnote')
            ->add('idartiste')
            ->add('idgenre')
            ->add('idinstrument')
            ->add('idmembre')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tabulous\TablatureBundle\Entity\Tablature'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'tabulous_tablaturebundle_tablature';
    }
}
