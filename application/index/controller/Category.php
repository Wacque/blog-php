<?php


namespace app\index\controller;
use app\index\helper\CategoryHelper;

class Category
{
    public function get_cate() {
        $res = CategoryHelper::getCate();

        return defaultData(0, 'ok', $res, count($res));
    }
}