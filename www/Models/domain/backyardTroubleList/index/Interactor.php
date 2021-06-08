<?php

namespace domain\backyardTroubleList\index;

use domain\backyardTroubleList\index\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\backyardTroubleList\index\RepositoryPort\TroubleListRepositoryPort;

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

    public function interact()
    {
        $articleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        $troubleList = $this->troubleListRepository->getTrouble();


        return (new Presenter)->present($troubleList, $articleCategoryNames);
    }
}
