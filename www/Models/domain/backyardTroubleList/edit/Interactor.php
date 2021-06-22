<?php

namespace domain\backyardTroubleList\edit;

use domain\backyardTroubleList\edit\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\csrfValidate\Interactor as CsrfValidator;
use domain\backyardTroubleList\edit\RepositoryPort\OldTroubleRepositoryPort;
use domain\backyardTroubleList\edit\RepositoryPort\ArticleCategoryNamesRepositoryPort;
use domain\components\adminLoginCheck\Interactor as LoginChecker;
use myapp\config\AppConfig;

class Interactor
{
    private $oldTroubleRepository;
    private $articleCategoryNamesRepository;

    public function __construct(
        OldTroubleRepositoryPort $oldTroubleRepository,
        ArticleCategoryNamesRepositoryPort $articleCategoryNamesRepository
    )
    {
        $this->oldTroubleRepository = $oldTroubleRepository;
        $this->articleCategoryNamesRepository = $articleCategoryNamesRepository;
    }

    /**
     * @param array $vars
     * 
     * @return
     */
    public function interact(array $vars)
    {
        $isLogin = (new LoginChecker)->interact();

        if ($isLogin === FALSE) {
            return AppConfig::NOT_LOGIN;
        }


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
            $oldTrouble = $this->oldTroubleRepository->getOldTrouble($trouble_id);

            if ($oldTrouble === NULL) {
                return (new Presenter)->reportNotFound('お探しの「お困りごと」は見つかりませんでした。');
            }
        }
        else {
            $oldTrouble = NULL;
        }

        $aritcleCategoryNames = $this->articleCategoryNamesRepository->getArticleCategoryNames();

        return (new Presenter)->present($oldTrouble, $aritcleCategoryNames, $csrfToken);
    }
}