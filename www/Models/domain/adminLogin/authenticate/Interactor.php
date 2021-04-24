<?php

namespace domain\adminLogin\authenticate;

use domain\adminLogin\authenticate\RepositoryPort\AdminLoginInfoRepositoryPort;
use domain\adminLogin\authenticate\RepositoryPort\LoginFailCountRepositoryPort;
use myapp\config\AdminInfoConfig;
use myapp\myFrameWork\SuperGlobalVars;

class Interactor
{
    /*
    private $adminLoginInfoRepository;

    public function __construct(
        AdminLoginInfoRepositoryPort $adminLoginInfoRepository
    )
    {
        $this->adminLoginInfoRepository = $adminLoginInfoRepository;
    }
    */
    
    /**
     * @return array
     * refer to Presenter
     */
    public function interact()
    {
        $post = SuperGlobalVars::getPost();
        $cookie = SuperGlobalVars::getCookie();

        $postedAdminID = (string) $post['adminID'];
        $postedPassword = (string) $post['password'];
        $afterLogin = ($cookie['afterLogin'] != NULL) ? (string) $cookie['afterLogin'] : '/backyard/index';

        $adminID = AdminInfoConfig::ADMIN_ID;
        $password = AdminInfoConfig::ADMIN_PASSWORD;
        //$loginFailCount = $this->adminLoginInfoRepository->getAdminLoginInfo()->toArray();

        // ログイン成功
        if ($postedAdminID === $adminID && $postedPassword === $password) {
            //$this->adminLoginInfoRepository->updateAdminLoginInfo(0, NULL);

            session_start([
                'gc_maxlifetime' => 60 * 60 * 24,
                'gc_probability' => 1,
                'gc_divisor' => 1
            ]);
            session_regenerate_id(TRUE);
            $_SESSION['username'] = 'admin';

            setcookie('isRetry', '', 1); //削除

            return (new Presenter)->present(TRUE, $afterLogin);
        }
        // ログイン失敗
        else {
            setcookie('isRetry', 'true', time() +  60 * 10);

            return (new Presenter)->present(FALSE, $afterLogin);
        }

    }
}
