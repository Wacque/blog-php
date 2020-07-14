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
    static function uploadImage($image)
    {

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
    static function updateArticleContent($id, $html, $title)
    {
        $updateTime = round(microtime(true) * 1000);

        $res = Db::name('post')
            ->where('id', $id)
            ->update(['html' => $html, 'title' => $title, "update_time" => $updateTime]);

        return $res;
    }

    static function addPostContent($html, $title, $cateId)
    {
        $updateTime = round(microtime(true) * 1000);

        var_dump([
            "title" => $title,
            "html" => $html,
            "update_time" => $updateTime,
            "create_time" => $updateTime,
            "cate_id" => $cateId,
            "image_list" => self::getImageList($html)
        ]);

        $res = Db::name('post')
            ->insert([
                "title" => $title,
                "html" => $html,
                "update_time" => $updateTime,
                "create_time" => $updateTime,
                "cate_id" => $cateId,
                "image_list" => self::getImageList($html)
            ]);

        return $res;
    }

    static function getImageList($html)
    {
        preg_match_all('/(id|alt|title|src)=("[^"]*")/i', $html, $matches);

        $ret = array();
        foreach($matches[0] as $i => $v) {
            $ret[] = trim($matches[2][$i],'"');
        }

        return $ret;
    }
}