<?php

namespace AppBundle\Controller;

use AppBundle\Rest\Posts;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $proxyFactory = $this->get('cos_rest_client.proxy_factory');
        $proxy = $proxyFactory->create(Posts::class);
        $proxy->get(1);
        $proxy->getWithQuery(1)->getBody()->getContents();

        die('aaaa');
    }

    /**
     * @Route("/form", name="form")
     */
    public function formAction(Request $request)
    {
        $proxyFactory = $this->get('cos_rest_client.proxy_factory');
        $proxy = $proxyFactory->create(Posts::class);
        $form = [
            'title' => 'foo',
            'body'  => 'bar',
            'userid' => 1
        ];
        $response = $proxy->form($form)->getBody()->getContents();
        dump($response);

        die('aaaa');
    }

    /**
     * @Route("/json", name="json")
     */
    public function jsonAction(Request $request)
    {
        $proxyFactory = $this->get('cos_rest_client.proxy_factory');
        $proxy = $proxyFactory->create(Posts::class);
        $form = [
            'title' => 'foo',
            'body'  => 'bar',
            'userid' => 1
        ];
        $response = $proxy->json($form)->getBody()->getContents();
        dump($response);

        die('aaaa');
    }
}
