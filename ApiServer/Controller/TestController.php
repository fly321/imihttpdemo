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
     * @Route(url="./article/show/{id}",method={"GET"},paramsGet="qq=1")
     */
    public function artice($id){
        return ['show'=>$id];
    }

    /**
     * @Action
     */
    public function getTest(int $id,string $name){
        return [
            'id'=>$id,
            'test'=>$name,
            '_get'=>$this->request->get('name'),
            '_post'=>$this->request->post('id',333)
        ];
    }

    /**
     * @Action
     */
    public function setCookie($name,$value){
        return $this->response->withCookie($name,$value);
    }

    /**
     * @Action
     */
    public function getCookie($name){
        return ['name'=>$name,'value'=>$this->request->getCookie($name,111)];
    }

}
