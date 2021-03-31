<?php

namespace domain\article\show;

use domain\article\show\RepositoryPort\ArticleContentRepositoryPort;
use domain\article\show\Validator\Validator;
use domain\Exception\ValidationFailException;

class Interactor
{
    private $articleContentRepository;
    
    public function __construct(
        ArticleContentRepositoryPort $articleContentRepository
    )
    {
        $this->articleContentRepository = $articleContentRepository;
    }


    /**
     * @param array $vars
     * 
     * @return array|int refer to Presenter 
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch(ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $article_id = $input['article_id'];

        $articleContent = $this->articleContentRepository->getArticleContent($article_id);

        if ($articleContent === NULL) {
            return (new Presenter)->reportNotFound('存在しないコラムが指定されています。');
        }

        return (new Presenter)->present($articleContent);
    }
}
