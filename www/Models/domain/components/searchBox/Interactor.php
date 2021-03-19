<?php

namespace domain\components\searchBox;

use domain\components\searchBox\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\searchBox\RepositoryPort\TroubleNameListRepositoryPort;

class Interactor
{
    private $troubleNameListRepository;

    public function __construct(
        TroubleNameListRepositoryPort $troubleNameListRepository
    )
    {
        $this->troubleNameListRepository = $troubleNameListRepository;
    }

    /**
     * @param array|NULL $vars
     * 
     * @return int AppConfig::POST_SUCCESS or AppConfig::INVALID_PARAMS
     * 
     * if validation fails, this returns AppConfig::INVALID_PARAMS
     * if post succeeds, this returns AppConfig::POST_SUCCESS
     */
    public function interact(?array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $troubleNameList = $this->troubleNameListRepository->getTroubleNameList();

        return (new Presenter)->present($input, $troubleNameList);

    }
}