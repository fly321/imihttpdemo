<?php
/**
 * TestController.php
 * 文件描述
 * created on 21:26 2022/4/25 21:26
 * create by xiflys
 */

namespace ImiApp\ApiServer\Controller;

use Imi\Server\Http\Controller\HttpController;
use Imi\Server\Http\Route\Annotation\Action;
use Imi\Server\Http\Route\Annotation\Controller;
use Imi\Server\Http\Route\Annotation\Route;
use Imi\Server\View\Annotation\HtmlView;
use Imi\Server\View\Annotation\View;

/**
 * @Controller("/test/")
 * @HtmlView(baseDir="index/")
 */
class TestController extends HttpController
{
    /**
     * @Action
     * @return array
     */
    public function test()
    {
        return ['data'=>'test'];
    }

    /**
     * @Action
     * @Route(url="./article/show/{id}",method="GET")
     */
    public function artice($id){
        return ['show'=>$id];
    }

}
