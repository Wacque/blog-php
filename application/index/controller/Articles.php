<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-03-30
 * Time: 15:28
 */

namespace app\index\controller;
use app\index\helper\ArticleHelper;
use app\index\helper\IndexHelper;
use app\index\helper\Parser;

class Articles
{
    /**
     * get article list
     * @return \think\response\Json
     */
    public function get_article_list() {
        $type = input('type');
        $cateId = 0;
        if(!empty($type)) {
            $cateId = IndexHelper::getCateId($type)['id'];
        }
        $res = IndexHelper::getCatePassage($cateId);
        return defaultData(0, 'ok', $res, count($res));
    }

    /**
     * get article detail
     * @return \think\response\Json
     */
    public function get_article_content() {
        $passageId = input('id');
        $res = ArticleHelper::getArticleContent($passageId);
        return defaultData(0, 'ok',$res, 0);
    }


}