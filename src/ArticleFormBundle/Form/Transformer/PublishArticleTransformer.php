<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PublishArticleTransformer
 *
 * @author jonathan
 */
namespace ArticleFormBundle\Form\Transformer;
use Symfony\Component\Form\DataTransformerInterface;
use ArticleFormBundle\Form\DTO\PublishArticleCommand;

class PublishArticleTransformer implements DataTransformerInterface {
    public function transform($article){
        if ($article === null) {
            return null;
        }
        $publishArticleCommand = new PublishArticleCommand();
        $publishArticleCommand->status = $article->getStatus();
        $publishArticleCommand->existingArticle = $article;
        return $publishArticleCommand;
    }

    public function reverseTransform($publishArticleCommand)
    {
        if ($publishArticleCommand->status == 'published') {
            $publishArticleCommand->existingArticle->publish();
        }
        else {
            $publishArticleCommand->existingArticle->unpublish();
        }
    }
}
