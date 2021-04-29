<?php

namespace domain\adminLogin\authenticate;

use domain\adminLogin\authenticate\RepositoryPort\AdminLoginInfoRepositoryPort;
use myapp\config\AppConfig;
use myapp\myFrameWork\SuperGlobalVars;

class Interactor
{
    
    private $adminLoginInfoRepository;

    public function __construct(
        AdminLoginInfoRepositoryPort $adminLoginInfoRepository
    )
    {
        $this->adminLoginInfoRepository = $adminLoginInfoRepository;
    }
    
    
    /**
     * @return array
     * refer to Presenter
     */
    public function interact()
    {
        $post = SuperGlobalVars::getPost();

        $postedAdminID = (string) $post['adminID'];
        $postedPassword = (string) $post['password'];
        $afterLogin = ($post['afterLogin'] !== NULL) ? (string) $post['afterLogin'] : '/backyard/index';

        $adminLoginInfo = $this->adminLoginInfoRepository->getAdminLoginInfo()->toArray();

        $adminID = $adminLoginInfo['adminID'];
        $pass_hash = $adminLoginInfo['pass'];
        $failCount = $adminLoginInfo['failCount'];
        $lockedTime = $adminLoginInfo['lockedTime'];

        session_start([
            'gc_maxlifetime' => AppConfig::LOGIN_SESSION_LIFETIME,
            'gc_probability' => 1,
            'gc_divisor' => 1,
            'cookie_lifetime' => AppConfig::LOGIN_SESSION_LIFETIME,
            'use_strict_mode' => TRUE
        ]);

        //lock中
        if (strtotime('now') - strtotime($lockedTime) <= AppConfig::ACCOUNT_LOCK_TIME) {
            $_SESSION['isLocked'] = TRUE; // すでに設定されているはずだが、念のため
            return (new Presenter)->present(FALSE, $afterLogin);
        }
        else {
            unset($_SESSION['isLocked']);

        }

        // ログイン成功
        if ($postedAdminID === $adminID && password_verify($postedPassword, $pass_hash)) {
            $this->adminLoginInfoRepository->updateFailCountAndLockedTime(0, NULL);

            
            session_regenerate_id(TRUE);
            $_SESSION['username'] = 'admin';

            //loginPage関連のsession削除
            unset($_SESSION['isRetry']);
            unset($_SESSION['isLocked']);
            

            return (new Presenter)->present(TRUE, $afterLogin);
        }
        // ログイン失敗
        else {
            $newFailCount = $failCount + 1;

            //規程回数以上失敗したらlockする
            if ($newFailCount > AppConfig::MAXNUM_LOGIN_FAIL) {
                $this->adminLoginInfoRepository->updateFailCountAndLockedTime(0, date("H:i:s"));
                $_SESSION['isLocked'] = TRUE;
            }
            else {
                $this->adminLoginInfoRepository->updateFailCountAndLockedTime($newFailCount, NULL);
            }

           $_SESSION['isRetry'] = TRUE;

            return (new Presenter)->present(FALSE, $afterLogin);
        }

    }
}
