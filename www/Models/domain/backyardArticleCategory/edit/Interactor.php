<?php

namespace domain\backyardArticleCategory\edit;

use domain\backyardArticleCategory\edit\RepositoryPort\OldArticleCategoryRepositoryPort;
use domain\backyardArticleCategory\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;
use domain\components\csrfValidate\Interactor as CsrfValidator;

class Interactor
{
    private $oldArticleCategoryRepository;

    public function __construct(
        OldArticleCategoryRepositoryPort $oldArticleCategoryRepository
    )
    {
        $this->oldArticleCategoryRepository = $oldArticleCategoryRepository;
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

        session_start();
        $csrfToken = (new CsrfValidator)->generateTokenAndSetSession();

        $c_id = $input['c_id'];

        if ($c_id !== NULL) {
            $oldArticleCategory = $this->oldArticleCategoryRepository->getOldArticleCategory($c_id);
            if ($oldArticleCategory === NULL) {
                return (new Presenter)->reportNotFound("指定されたカテゴリは見つかりませんでした。");
            }
        }
        else {
            $oldArticleCategory = NULL;
        }
        
        return (new Presenter)->present($oldArticleCategory, $csrfToken);
    }

}