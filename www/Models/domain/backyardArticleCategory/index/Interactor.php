<?php

namespace domain\backyardArticleCategory\index;

use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;

class Interactor
{
    private $articleCategoryNamesRepository;

    public function __construct(
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }


    /**
     * @return array|int
     * refer to Presenter
     * 
     * if not login, this returns AppConfig::NOT_LOGIN
     */
    public function interact()
    {
        $isLogin = (new LoginCheckInteractor)->interact();
        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }

        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        return (new Presenter)->present($articleCategoryNames);
    }
}
