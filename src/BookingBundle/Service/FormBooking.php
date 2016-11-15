<?php
/**
 * Created by PhpStorm.
 * User: AnCat
 * Date: 15/11/2016
 * Time: 09:13
 */

namespace BookingBundle\Service;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormBooking extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateVisite', TextType::class, array('label' => 'Date de la visite', 'attr' => array('class' => 'container input-group date')))
            ->add('periode', ChoiceType::class, array('label' => 'Période', 'choices'  => array(
                'Journée' => '1',
                'Demi-journée' => '2',
            )))
            ->add('nombreBillet', TextType::class, array('label' => 'Nombre de billet', 'attr' => array('class' => 'form-group')))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
    }
}