<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-06-27
 * Time: 00:26
 */
namespace app\index\helper;
use think\Db;

class ArticleHelper
{
    static function getArticleContent($id) {
        $res = Db::name('post')
            ->field('id, title, author, html, create_time, update_time, cate_id')
            ->where('id', $id)
            ->find();

        return $res;
    }


}