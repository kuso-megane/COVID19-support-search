<?php

namespace domain\backyardSupportOrgs\index;

use domain\backyardSupportOrgs\index\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\backyardSupportOrgs\index\RepositoryPort\AreaListRepositoryPort;
use domain\backyardSupportOrgs\index\RepositoryPort\SearchedSupportsRepositoryPort;
use phpDocumentor\Reflection\Types\Null_;

class Interactor
{
    private $areaListRepository;
    private $searchedSupportsRepository;

    public function __construct(
        AreaListRepositoryPort $areaListRepository,
        SearchedSupportsRepositoryPort $searchedSupportsRepository
    )
    {
        $this->areaListRepository = $areaListRepository;
        $this->searchedSupportsRepository = $searchedSupportsRepository;
    }

    /**
     * @return array
     * refer to Presenter
     */
    public function interact()
    {
        try {
            $input = (new Validator)->validate()->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $owner_word = $input['owner_word'];

        $areaList = $this->areaListRepository->getAreaList();

        if ($owner_word !== NULL) {
            $searchedSupports = $this->searchedSupportsRepository->searchSupports($owner_word);
        }
        else {
            $searchedSupports = NULL
        }


        return (new Presenter)->present($areaList, $searchedSupports);

    }
}
