<?php

namespace myapp\controllers;

require __DIR__. '/viewFilePath.php';
require __DIR__. '/helpers/render.php';

use myapp\viewModel\category\CategoryIndexVM;


class CategoryController
{


    public function index(?array $vars)
    {
        //sample data
        $recentArtclInfos = [

            ['artclId' => 1, 'title' => 'sampleTitle1ああああああああああ', 'updateDate' => '2021-2-10',
                'thumbnailImg' => '/asset/img/test_img.jpg'],

            ['artclId' => 2, 'title' => 'sampleTitle2いいいいいいいいいいいいい', 'updateDate' => '2021-2-10',
            'thumbnailImg' => '/asset/img/test_img.jpg'],

            ['artclId' => 3, 'title' => 'sampleTitle3ううううううううううううううう', 'updateDate' => '2021-2-10',
            'thumbnailImg' => '/asset/img/test_img.jpg']
            
        ];
        $categoryArtclCount = ['プログラミング' => 6, '読書' => 5];
        $subCategoryArtclCount = ['プログラミング' => ['web' => 4, 'game' => 2], '読書' => ['マンガ' => 3, '小説' => 2]];

        // modelからdata作成
        $data = [
            'recentArtclInfos' => $recentArtclInfos,
            'categoryArtclCount' => $categoryArtclCount,
            'subCategoryArtclCount' => $subCategoryArtclCount
        ];


        $vm = new CategoryIndexVM($data);
        render($vm, 'category', 'index');
    }


    public function list(array $var)
    {
        //modelから該当カテゴリの最新投稿を持ってくる
        //$data =
        require VIEW_FILE_PATH.'category/list.php';   
    }
}