<?php

namespace domain\backyardSupportOrgs\post;

use domain\backyardSupportOrgs\post\Validator\Validator;
use domain\Exception\ValidationFailException;
use domain\backyardSupportOrgs\post\RepositoryPort\PostSupportOrgsRepositoryPort;

class Interactor
{

    private $postSupportOrgsRepository;

    public function __construct(
        PostSupportOrgsRepositoryPort $postSupportOrgsRepository
    )
    {
        $this->postSupportOrgsRepository = $postSupportOrgsRepository;
    }

    /**
     * @param array $vars
     * 
     * @return array
     * refer to Presenter
     */
    public function interact(array $vars)
    {
        try {
            $input = (new Validator)->validate($vars)->toArray();
        }
        catch (ValidationFailException $e) {
            return (new Presenter)->reportValidationFailure($e->getMessage());
        }


        $id = $input['id'];
        $area_id = $input['area_id'];
        $support_content = $input['support_content'];
        $owner = $input['owner'];
        $access = $input['access'];
        $is_foreign_ok = $input['is_foreign_ok'];
        $is_public = $input['is_public'];
        $appendix = $input['appendix'];

        $isSuccess = $this->postSupportOrgsRepository->postSupportOrgs(
            $id, $area_id, $support_content, $owner, $access, $is_foreign_ok, $is_public, $appendix
        );

        if ($isSuccess) {
            return (new Presenter)->present(TRUE, '支援団体の作成・更新に成功しました。');
        }
        else {
            return (new Presenter)->present(FALSE, '支援団体の作成・更新に失敗しました。');
        }

    }
}