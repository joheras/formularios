<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PizzaFormBundle\Form;
/**
 * Description of PedidoType
 *
 * @author jonathan
 */
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;



class PedidoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('custname', TextType::class)
                ->add('custtel', TextType::class)
                ->add('custemail', EmailType::class)
                ->add('size', ChoiceType::class, array('choices' =>
                    array('small' => 'small', 'medium' => 'medium', 'large' => 'large')))
                ->add('toppings', ChoiceType::class, array('choices' => 
                    array('cheese' => 'cheese', 'bacon' => 'bacon', 'onion' => 'onion', 'mushroom' => 'mushroom'),
                    'multiple' => true))
                ->add('comments')
                // Añadimos el botón de enviar
                ->add('enviar', SubmitType::class, array('label' => 'Enviar'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class' => 'PizzaFormBundle\Model\Pedido')); 
    }

    public function getName() {
        return 'pizza_form'; // un nombre único para el formulario 
    }

}
