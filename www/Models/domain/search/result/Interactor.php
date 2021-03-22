<?php

namespace domain\search\result;

use domain\Exception\ValidationFailException;
use domain\search\result\RepositoryPort\SearchedSupportsRepositoryPort;
use domain\search\result\Validator\Validator;

class Interactor
{
    private $searchedSupportOrgsRepository;

    public function __construct(SearchedSupportsRepositoryPort $searchedSupportOrgsRepository)
    {
        $this->searchedSupportOrgsRepository = $searchedSupportOrgsRepository;
    }

    /**
     * @param array $vars
     * 
     * @return array|int refer to Presenter 
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $trouble_id = $input['trouble_id'];
        $region_id = $input['region_id'];
        $area_id = $input['area_id'];
        $is_foreign_ok = $input['is_foreign_ok'];
        $is_public_page = $input['is_public_page']; //　最初に表示するタブが公的か民間か
        $pub_p = $input['pub_p'];
        $pri_p = $input['pri_p'];

        $publicSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $trouble_id, $region_id, $area_id, $is_foreign_ok, TRUE, $pub_p
        );

        $privateSupports = $this->searchedSupportOrgsRepository->searchSupports(
            $trouble_id, $region_id, $area_id, $is_foreign_ok, TRUE, $pri_p
        );

        

    }
}
