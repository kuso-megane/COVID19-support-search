<?php

namespace domain\backyardTroubleList\index;

use domain\backyardTroubleList\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\TroubleListRepositoryPort;
use domain\components\adminLoginCheck\Interactor as LoginChecker;
use myapp\config\AppConfig;

class Interactor
{
    private $articleCategoryNamesRepository;
    private $troubleListRepository;

    
    public function __construct(
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository,
        TroubleListRepositoryPort $troubleListRepository
    )
    {
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
        $this->troubleListRepository = $troubleListRepository;
    }


    /**
     * @return array refer to Presenter
     */
    public function interact()
    {
        $isLogin = (new LoginChecker)->interact();

        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }

        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        $troubleList = $this->troubleListRepository->getTrouble();


        return (new Presenter)->present($troubleList, $articleCategoryNames);
    }
}
