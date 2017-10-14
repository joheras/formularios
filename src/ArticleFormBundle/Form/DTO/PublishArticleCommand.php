<?php

namespace ArticleFormBundle\Form\DTO;

use Symfony\Component\Validator\Constraints as Assert;


class PublishArticleCommand {
    /**
     * @Assert\Choice(choices = {"draft", "published"})
     */
    public $status;

    public $existingArticle;
}