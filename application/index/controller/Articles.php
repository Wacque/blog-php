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
    public function get_article_list() {
        $type = input('type');
        $cateId = 0;
        if(!empty($type)) {
            $cateId = IndexHelper::getCateId($type)['id'];
        }
        $res = IndexHelper::getCatePassage($cateId);
        return defaultData(0, 'ok', $res, count($res));
    }

    public function get_article_content() {
        $passageId = input('id');
        $res = ArticleHelper::getArticleContent($passageId);
//        $articleName = IndexHelper::articleIdToName($passageId)['name'];
//        if(empty($articleName)) {
//            return defaultData(0, 'invalid article id', [], 0);
//        }
//        $parser = new Parser();
//        $text = file_get_contents(' ../../../public/static/passages/' . $articleName . '.md');
//        $html = $parser->makeHtml($text);
//        $res = Array(
//            'name' => $articleName,
//            'html' => $html
//        );
        return defaultData(0, 'ok',$res, 0);
    }


}