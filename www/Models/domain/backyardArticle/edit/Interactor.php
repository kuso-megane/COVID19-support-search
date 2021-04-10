<?php

namespace domain\backyardArticle\edit;

use domain\backyardArticle\edit\Presenter;
use domain\components\articleCategoryNames\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\edit\Validator\Validator;
use domain\Exception\ValidationFailException;

class Interactor
{
    private $oldArticleContentRepository;
    private $articleCategoryNamesRepository;
    
    public function __construct(
        OldArticleContentRepositoryPort $oldArticleContentRepository,
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->oldArticleContentRepository = $oldArticleContentRepository;
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
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

        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();
        
        $isNew = ($artcl_id != NULL) ? FALSE : TRUE;

        return (new Presenter)->present($isNew, $oldArticleContent, $articleCategoryNames);
    }
}
