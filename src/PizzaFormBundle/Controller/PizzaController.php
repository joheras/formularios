<?php

namespace PizzaFormBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use PizzaFormBundle\Model\Pedido;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use PizzaFormBundle\Form\PedidoType;

class PizzaController extends Controller {

    public function pizzaDeliveryManualFormAction() {
        $post = Request::createFromGlobals();
        if ($post->request->has('submit')) {
            $custname = $post->request->get('custname');
            $custtel = $post->request->get('custtel');
            $custemail = $post->request->get('custemail');
            $size = $post->request->get('size');
            $toppings = $post->request->get('topping');
            $comments = $post->request->get('comments');
            return $this->render("PizzaFormBundle:Pizza:summary.html.twig", array('custname' => $custname,
                        'custtel' => $custtel,
                        'custemail' => $custemail,
                        'size' => $size,
                        'toppings' => $toppings,
                        'comments' => $comments));
        } else {
            return $this->render("PizzaFormBundle:Pizza:pizzaform.html.twig");
        }
    }

    public function pizzaDeliveryObjectFormAction(Request $peticion) {
        // Creamos el formulario
        $pedido = new Pedido();
        $form = $this->createFormBuilder($pedido) // Creamos el constructor de formulario
                // Añadimos los distintos campos del formulario
                ->add('custname', TextType::class)
                ->add('custtel', TextType::class)
                ->add('custemail', EmailType::class)
                ->add('size', ChoiceType::class, array('choices' =>
                    array('small' => 'small', 'medium' => 'medium', 'large' => 'large')))
                ->add('toppings', ChoiceType::class, array('choices' => 
                    array('cheese' => 'cheese', 'bacon' => 'bacon', 'onion' => 'onion', 'mushroom' => 'mushroom'),
                    'multiple' => true))
                ->add('comments')
                // Añadimos el botón de enviar
                ->add('enviar', SubmitType::class, array('label' => 'Enviar'))
                // Finalmente obtenemos el formulario
                ->getForm();

        // Gestionamos la petición
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isValid()) {
            return $this->render("PizzaFormBundle:Pizza:summary2.html.twig", array('pedido'=> $pedido));
        }
        // Mostramos el formulario vacío
        return $this->render("PizzaFormBundle:Pizza:pizzaform2.html.twig",
                array('formulario' => $form->createView()));
    }
    
    
    
    public function pizzaDeliveryClassFormAction(Request $peticion) {
        // Creamos el formulario
        $pedido = new Pedido();
        $form = $this -> createForm(PedidoType::class,$pedido);

        // Gestionamos la petición
        $form->handleRequest($peticion);
        // Comprobamos si el formulario es válido
        if ($form->isValid()) {
            return $this->render("PizzaFormBundle:Pizza:summary2.html.twig", array('pedido'=> $pedido));
        }
        // Mostramos el formulario vacío
        return $this->render("PizzaFormBundle:Pizza:pizzaform3.html.twig",
                array('formulario' => $form->createView()));
    }
}