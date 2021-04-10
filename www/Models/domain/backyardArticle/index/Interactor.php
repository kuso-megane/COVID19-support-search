<?php

namespace domain\backyardArticle\index;

use domain\components\articleCategoryNames\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardArticle\index\RepositoryPort\ArticleBYInfosRepositoryPort;

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
     * @return array
     * 
     * refer to Presenter
     */
    public function interact()
    {
        $articleBYInfos = $this->articleBYInfosRepository->getArticleBYInfos();
        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();


        return (new Presenter)->present($articleBYInfos, $articleCategoryNames);
    }
}
