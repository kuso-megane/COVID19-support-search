<?php

namespace domain\backyardArticleCategory\index;

use domain\backyardArticleCategory\index\RepositoryPort\ArticleCategoryListRepositoryPort;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;

class Interactor
{
    private $articleCategoryListRepository;

    public function __construct(
        ArticleCategoryListRepositoryPort $articleCategoryListRepository
    )
    {
        $this->articleCategoryListRepository = $articleCategoryListRepository;
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

        $articleCategoryList = $this->articleCategoryListRepository->getArticleCategoryList();

        return (new Presenter)->present($articleCategoryList);
    }
}
