<?php 

namespace domain\article\_list;

use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\ArticleCategoryListRepositoryPort;

class Interactor
{
    private $allArticleInfosRepository;
    private $articleCategoryListRepository;

    public function __construct(
        AllArticleInfosRepositoryPort $allArticleInfosRepository,
        ArticleCategoryListRepositoryPort $articleCategoryListRepository
    )
    {
        $this->allArticleInfosRepository = $allArticleInfosRepository;
        $this->articleCategoryListRepository = $articleCategoryListRepository;
    }


    /**
     * @param array $vars
     * 
     * @return array 
     */
    public function interact()
    {
        $categoryList = $this->articleCategoryListRepository->getCategoryList();
        $articleInfos = $this->allArticleInfosRepository->getAllArticleInfos();

        return (new Presenter)->present($articleInfos, $categoryList);
    }
}
