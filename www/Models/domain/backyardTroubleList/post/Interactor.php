<?php

namespace domain\backyardTroubleList\post;

use domain\backyardTroubleList\post\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\components\csrfValidate\Interactor as CsfrValidator;
use domain\backyardTroubleList\post\RepositoryPort\PostTroubleRepositoryPort;

class Interactor
{

    private $postTroubleRepository;

    public function __construct(
        PostTroubleRepositoryPort $postTroubleRepository
    )
    {
        $this->postTroubleRepository = $postTroubleRepository;
    }

    /**
     * @param array $vars
     * 
     * @return array
     * 
     * refer to Presenter
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars);
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }

        $id = $input['id'];
        $name = $input['name'];
        $articleC_id = $input['articleC_id'];
        $csrfToken = $input['csrfToken'];

        session_start();
        $isCsrfTokenValid = (new CsfrValidator)->validateAndUnsetSession($csrfToken);
        if (!$isCsrfTokenValid) {
            return (new Presenter)->reportInvalidAccess('不正なフォームからの送信です。');
        }

        $isPostSucceeded = $this->postTroubleRepository->postTrouble($id, $name, $articleC_id);
        if ($isPostSucceeded === FALSE) {
            return (new Presenter)->present(FALSE, '作成・更新に失敗しました。');
        }

        return (new Presenter)->present(TRUE, '作成・更新に成功しました。');
    
    }
}