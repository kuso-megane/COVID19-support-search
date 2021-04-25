<?php

namespace domain\backyardArticleCategory\edit;

use domain\backyardArticleCategory\edit\RepositoryPort\ArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;
use domain\components\csrfValidate\Interactor as CsrfValidator;

class Interactor
{
    private $articleCategoryRepository;

    public function __construct(
        ArticleCategoryRepositoryPort $articleCategoryRepository
    )
    {
        $this->articleCategoryRepository = $articleCategoryRepository;
    }


    /**
     * @param array $vars
     * 
     * @return array|int
     * refer to Presenter
     * 
     * if not login, this returns, AppConfig::NOT_LOGIN
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

        $csrfToken = (new CsrfValidator)->generateTokenAndSetSession();

        $c_id = $input['c_id'];

        if ($c_id != NULL) {
            $articleCategory = $this->articleCategoryRepository->getArticleCategory($c_id);
            if ($articleCategory === NULL) {
                return (new Presenter)->reportNotFound("指定されたカテゴリは見つかりませんでした。");
            }
        }
        else {
            $articleCategory = NULL;
        }
        
        return (new Presenter)->present($articleCategory, $csrfToken);
    }

}