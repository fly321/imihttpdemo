<?php

/**
 * TestController.php
 * 文件描述
 * created on 21:26 2022/4/25 21:26
 * create by xiflys
 */

namespace ImiApp\ApiServer\Controller;

use Imi\Server\Http\Controller\HttpController;
use Imi\Server\Http\Message\UploadedFile;
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
        return ['data' => 'test'];
    }

    /**
     * @Action
     * @Route(url="./article/show/{id}",method={"GET"},paramsGet="qq=1")
     */
    public function artice($id)
    {
        return ['show' => $id];
    }

    /**
     * @Action
     */
    public function getTest(int $id, string $name)
    {
        return [
            'id' => $id,
            'test' => $name,
            '_get' => $this->request->get('name'),
            '_post' => $this->request->post('id', 333)
        ];
    }

    /**
     * @Action
     */
    public function setCookie($name, $value)
    {
        return $this->response->withCookie($name, $value);
    }

    /**
     * @Action
     */
    public function getCookie($name)
    {
        return ['name' => $name,'value' => $this->request->getCookie($name, 111)];
    }

    /**
     * @Action
     * ImageUrl http://inews.gtimg.com/newsapp_ls/0/14805646356/0
     */
    public function testHeader()
    {
        return $this->response->withHeader("hellofly", $this->request->getHeaderLine('xixi'));
    }

    /**
     * @Action
     */
    public function other(): array
    {
        return [
           'url' => $this->request->getUri()->__toString(),
           'server' => $this->request->getServerParams()
        ];
    }

    /**
     * @Action
     * @View(renderType="html")
     */
    public function response_html()
    {
        return "hello xiflys";
    }


    /**
     * @Action
     */
    public function upload_demo(): array
    {
        $uploadedFiles = $this->request->getUploadedFiles();
        $arr = [];
        /**
         * @var UploadedFile $file
         */
        foreach ($uploadedFiles as $file) {
            $arr[] = array(
                'filename' => $file->getClientFilename(),
                'media_type' => $file->getClientMediaType(),
                'tmp' => $file->getTmpFilename(),
                'size' => $file->getSize(),
                'size2' => strlen($file->getStream()->getContents())
            );
        }

        return $arr;
    }
}
