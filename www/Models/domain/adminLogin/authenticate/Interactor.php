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
        $afterLogin = ($post['afterLogin'] != NULL) ? (string) $post['afterLogin'] : '/backyard/index';

        $adminLoginInfo = $this->adminLoginInfoRepository->getAdminLoginInfo()->toArray();
        
        $adminID = $adminLoginInfo['adminID'];
        $pass_hash = $adminLoginInfo['pass'];
        $failCount = $adminLoginInfo['failCount'];
        $lockedTime = $adminLoginInfo['lockedTime'];

        //lock中
        if (strtotime('now') - strtotime($lockedTime) <= AppConfig::ACCOUNT_LOCK_TIME) {
            setcookie('isLocked', 'true', time() + AppConfig::ACCOUNT_LOCK_TIME);
            return (new Presenter)->present(FALSE, $afterLogin);
        }

        // ログイン成功
        if ($postedAdminID === $adminID && password_verify($postedPassword, $pass_hash)) {
            $this->adminLoginInfoRepository->updateFailCountAndLockedTime(0, NULL);

            session_start([
                'gc_maxlifetime' => 60 * 60 * 24,
                'gc_probability' => 1,
                'gc_divisor' => 1
            ]);
            session_regenerate_id(TRUE);
            $_SESSION['username'] = 'admin';

            //cookie削除
            setcookie('isRetry', '', 1); 
            setcookie('isLocked', '', 1);

            return (new Presenter)->present(TRUE, $afterLogin);
        }
        // ログイン失敗
        else {
            $newFailCount = $failCount + 1;

            //規程回数以上失敗したらlockする
            if ($newFailCount > AppConfig::MAXNUM_LOGIN_FAIL) {
                $this->adminLoginInfoRepository->updateFailCountAndLockedTime(0, date("H:i:s"));
                setcookie('isLocked', 'true', time() + AppConfig::ACCOUNT_LOCK_TIME);
            }
            else {
                $this->adminLoginInfoRepository->updateFailCountAndLockedTime($newFailCount, NULL);
            }

            setcookie('isRetry', 'true', time() +  60 * 10);

            return (new Presenter)->present(FALSE, $afterLogin);
        }

    }
}
