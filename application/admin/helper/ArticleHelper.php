<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-06-27
 * Time: 12:51
 */

namespace app\admin\helper;
use think\Db;

class ArticleHelper
{
    /**
     * upload image
     * @param $image
     */
    static function uploadImage($image) {

    }

    /**
     * update article
     * @param $id
     * @param $html
     * @param $delta
     * @param $name
     * @return int|string
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    static function updateArticleContent($id, $html, $delta, $name) {
        $res = Db::name('passages')
            ->where('id', $id)
            ->update(['html' => $html,'delta'=> $delta, 'name' => $name]);

        return $res;
    }
}