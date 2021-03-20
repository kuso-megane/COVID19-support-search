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
     * Note that this doesn't execute searching but make search box
     * 
     * @return array|ValidationFailException Presenter->present() | Presenter->reportValidationFailure()
     * 
     * if validation fails, this throws ValidationFailException
     */
    public function interact()
    {
        try {
            $input = (new Validator)->validate()->toArray();
        }
        catch (ValidationFailException $e) {
            throw $e;
            return [];
        }

        $troubleNameList = $this->troubleNameListRepository->getTroubleNameList();

        return (new Presenter)->present($input, $troubleNameList);

    }
}