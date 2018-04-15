<?php
/**
 * Created by PhpStorm.
 * User: jp.dou
 * Date: 2018/4/13
 * Time: 23:14
 */

namespace Controller;


class PostController extends AbstractController
{
    public function View()
    {
        /** @var \Model\Entity\Post $post */
        $post = \Factory::create(\Model\Entity\Post::class);
        $urlKey = rtrim($this->getRequest()->getParam(0), '.html');
        if ($urlKey) {
            $post->load($urlKey, 'url_key');
            if ($post->getId()) {
                \Registry::set('current_post', $post);
            }
        }

        $titleSections = [];
        array_push($titleSections, $post->getTitle(). ' 种子 下载');
        if ($post->getCategory()) {
            array_push($titleSections, $post->getCategory()->getName());
        }
        $this->getLayout()->setPageData('title', implode('|', $titleSections))
            ->setPageData('keywords', $post->getKeywords())
            ->setPageData('description', $post->getDescription())
            ->setPageData('url', $post->getUrl())
        ;
        $this->renderPage();
    }
}