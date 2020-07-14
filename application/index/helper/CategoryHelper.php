<?php
namespace app\index\helper;
use think\Db;

class CategoryHelper
{
    static function getCate() {
        $res = Db::name('category')
            ->field('id, name')
            ->where("deleted", 0)
            ->select();

        return $res;
    }
}