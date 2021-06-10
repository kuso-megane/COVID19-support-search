<?php

namespace domain\backyardTroubleList\edit;

use domain\backyardTroubleList\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use myapp\config\AppConfig;
use domain\components\csrfValidate\Interactor as CsrfValidator;
use domain\backyardTroubleList\edit\RepositoryPort\OldTroublesRepositoryPort;
use domain\backyardTroubleList\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort;

class Interactor
{
    private $oldTroublesRepository;
    private $articleCategoryNamesRepository;

    public function __construct(
        OldTroublesRepositoryPort $oldTroublesRepository,
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->oldTroublesRepository = $oldTroublesRepository;
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }

    /**
     * @param array $vars
     * 
     * @return
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

        session_start();
        $csrfToken = (new CsrfValidator)->generateTokenAndSetSession();

        

        if ($trouble_id !== NULL) {
            $oldTroubles = $this->oldTroublesRepository->getOldTroubles($trouble_id);

            if ($oldTroubles === NULL) {
                return (new Presenter)->reportNotFound('お探しの「お困りごと」は見つかりませんでした。');
            }
        }
        else {
            $oldTroubles = [];
        }

        $aritcleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        return (new Presenter)->present($oldTroubles, $aritcleCategoryNames, $csrfToken);
    }
}