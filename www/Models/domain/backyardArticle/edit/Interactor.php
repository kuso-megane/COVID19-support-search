<?php

namespace domain\backyardArticle\edit;

use domain\backyardArticle\edit\Presenter;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\edit\Validator\Validator;
use domain\Exception\ValidationFailException;

class Interactor
{
    private $oldArticleContentRepository;
    
    public function __construct(
        OldArticleContentRepositoryPort $oldArticleContentRepository
    )
    {
        $this->oldArticleContentRepository = $oldArticleContentRepository;
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
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $artcl_id = $input['artcl_id'];

        if ($artcl_id != NULL) {
            $oldArticleContent = $this->oldArticleContentRepository->getOldArticleContent($artcl_id);

            if ($oldArticleContent === NULL) {
                return (new Presenter)->reportNotFound('お探しのコラムは見つかりませんでした。');
            }
        }
        else {
            $oldArticleContent = NULL;
        }
        

        return (new Presenter)->present($oldArticleContent);
    }
}
