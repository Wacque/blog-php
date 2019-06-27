<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-06-27
 * Time: 12:50
 */

namespace app\admin\controller;
use app\admin\helper\ArticlerHelper;

class Article
{
    /**
     * upload image
     * @return \think\response\Json
     */
    public function upload() {
        $file = request()->file('image');
        // 移动到框架应用根目录/public/uploads/ 目录下
        //判断是否有图
        if($file){
            $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'images');
            if($info) {
                return defaultData(0, 'upload success', [url => 'https://api.wuacque.cn/images/' . $info->getSaveName()], 0);
            } else {
                return defaultData(-1, 'error: empty file',[error => $file->getError()], 0);
            }
        }else{
            return defaultData(-1, 'error: empty file',[], 0);
        }
    }

    /**
     * update article
     * @return \think\response\Json
     */
    public function update_article_content() {
        $passageId = input('post.id');
        $html = input('post.html');
        $delta = input('post.delta');
        $name = input('post.name');
        if(! $passageId || !$html ) {
            return defaultData(-1, 'error', [], 0);
        }
        $res = ArticleHelper::updateArticleContent($passageId, $html, $delta, $name);
        return defaultData(0, 'ok',$res, 0);
    }
}