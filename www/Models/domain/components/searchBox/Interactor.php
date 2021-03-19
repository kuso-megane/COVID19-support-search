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
     * @return array|ValidationFailException Presenter->present() | Presenter->reportValidationFailure()
     * 
     * if validation fails, this returns ValidationFailException
     */
    public function interact(?array $vars = NULL)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            throw $e;
            return [];
        }

        $troubleNameList = $this->troubleNameListRepository->getTroubleNameList();

        return (new Presenter)->present($input, $troubleNameList);

    }
}