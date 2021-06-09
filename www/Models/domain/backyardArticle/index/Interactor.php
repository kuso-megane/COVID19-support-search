<?php

namespace domain\backyardArticle\index;

use domain\backyardArticle\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;
use domain\components\adminLoginCheck\Interactor as LoginCheckInteractor;
use myapp\config\AppConfig;

class Interactor
{

    private $articleBYInfosRepository;
    private $articleCategoryNamesRepository;
    
    public function __construct(
        ArticleBYInfosRepositoryPort $articleBYInfosRepository,
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->articleBYInfosRepository = $articleBYInfosRepository;
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }


    /**
     * @return array|int
     * 
     * refer to Presenter
     * 
     * if not login, return AppConfig::NOT_LOGIN
     */
    public function interact()
    {
        $isLogin = (new LoginCheckInteractor)->interact();

        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }


        $articleBYInfos = $this->articleBYInfosRepository->getArticleBYInfos();
        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();


        return (new Presenter)->present($articleBYInfos, $articleCategoryNames);
    }
}
