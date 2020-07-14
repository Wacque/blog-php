<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-03-30
 * Time: 14:43
 */
namespace app\index\helper;
use think\Db;

class IndexHelper
{
    static function getCatePassage($cateId) {
        $res = Db::name('post')
            ->field('id, title, author, create_time');
        if ($cateId > 0){
            $res = $res->where('cate_id', $cateId);
        }
        $res = $res->select();
        return $res;
    }

    static function getCateId($cateName) {
        $res = Db::name('category')
            ->field('id')
            ->where('name', $cateName)
            ->find();

        return $res;
    }

    static function articleIdToName($id) {
        $res = Db::name('post')
            ->field('id, name')
            ->where('id', $id)
            ->find();

        return $res;
    }
}