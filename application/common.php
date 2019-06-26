<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function defaultData($resultcode = 0, $msg = '', $results = [], $total = 0)
{
    $data = [
        'resultcode' => $resultcode,
        'msg' => $msg,
        'data' => [
            'results' => $results
        ],
        'total' => $total
    ];
    return json($data);
}