<?php 

namespace domain\article\_list;

use domain\article\_list\RepositoryPort\AllArticleInfosRepositoryPort;
use domain\article\_list\RepositoryPort\CategoryListRepositoryPort;

class Interactor
{
    private $allArticleInfosRepository;
    private $categoryListRepository;

    public function __construct(
        AllArticleInfosRepositoryPort $allArticleInfosRepository,
        CategoryListRepositoryPort $categoryListRepository
    )
    {
        $this->allArticleInfosRepository = $allArticleInfosRepository;
        $this->categoryListRepository = $categoryListRepository;
    }


    /**
     * @param array $vars
     * 
     * @return array 
     */
    public function interact()
    {
        $categoryList = $this->categoryListRepository->getCategoryList();
        $articleInfos = $this->allArticleInfosRepository->getAllArticleInfos();

        return (new Presenter)->present($articleInfos, $categoryList);
    }
}
