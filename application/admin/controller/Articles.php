<?php
/**
 * Created by PhpStorm.
 * User: wurengui
 * Date: 2019-06-27
 * Time: 12:50
 */

namespace app\admin\controller;
use app\admin\helper\ArticleHelper;
use app\admin\helper\ArticlerHelper;
use think\Exception;
use think\exception\PDOException;

class Articles
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
     * @return \think\response\Json
     * @throws Exception
     * @throws PDOException
     */
    public function update_article_content() {
        $id = input('post.id');
        $html = input('post.html');
        $title = input('post.title');

        if(!$id || !$html ) {
            return defaultData(-1, 'error', [], 0);
        }

        $res = ArticleHelper::updateArticleContent($id, $html, $title);
        return defaultData(0, 'ok',$res, 0);
    }

    /**
     * @return \think\response\Json
     */
    public function add_article_content() {
        $html = input('post.html');
        $title = input('post.title');
        $cateId = input('post.cateId');

        if(!$html || !$title || !$cateId) {
            return defaultData(-1, 'error', [], 0);
        }

        $res = ArticleHelper::addPostContent($html, $title, $cateId);

        return defaultData(0, 'ok',$res, 0);
    }
}