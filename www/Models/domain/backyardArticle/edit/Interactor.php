<?php

namespace domain\backyardArticle\edit;

use domain\backyardArticle\edit\Presenter;
use domain\components\articleCategoryNames\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\edit\RepositoryPort\OldArticleContentRepositoryPort;
use domain\backyardArticle\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;
use domain\components\csrfValidate\Interactor as CsrfValidator;

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
     * 
     * if not login, return AppConfig::NOT_LOGIN
     */
    public function interact(array $vars)
    {
        $isLogin = (new LoginCheckInteractor)->interact();
        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }

        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        session_start();
        $csrfToken = (new CsrfValidator)->generateTokenAndSetSession();

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

        return (new Presenter)->present($isNew, $oldArticleContent, $articleCategoryNames, $csrfToken);
    }
}
