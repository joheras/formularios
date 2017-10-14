<?php


namespace ArticleFormBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use ArticleFormBundle\Form\Transformer\PublishArticleTransformer;
use ArticleFormBundle\Form\DTO\PublishArticleCommand;

class ArticleType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add(
            'status',
           ChoiceType::class,
            [
                'choices' => [
                    'draft' => 'Draft',
                    'published' => 'Published'
                ]
            ])->add('enviar', SubmitType::class, array('label' => 'Enviar'));

        $builder->addViewTransformer(new PublishArticleTransformer());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array('data_class' => 'ArticleFormBundle\Form\DTO\PublishArticleCommand')); 
    }

    public function getName() {
        return 'article_form'; // un nombre único para el formulario 
    }

    
    
}
