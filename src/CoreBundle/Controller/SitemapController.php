<?php

namespace Core\Controller;


use Core\Controller\Traits\BaseController;
use Shopping\Entity\Category;
use Shopping\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class SitemapController extends AbstractController
{
    use BaseController;

    /**
     * @Route("/test", defaults={"_format"="xml"}, name="_demo_hello")
     */
    public function sitemap(Request $request)
    {
        $this->setPages();

        $urls = [];
        $lastmod = date("Y-m-d");
        $change = 'daily';

        foreach ($this->vars['pages'] as $page) {

            if ($page->getIsEnabled() && $page->getIsIndexable() && $page->getUri() != 'unknown') {

                switch (str_replace('App\Entity\\', '', get_class($page))) {

                    case 'PageCategory':

                        $categories = $this->getDoctrine()->getRepository(Category::class)->findBy([
                            'is_enabled' => 1,
                            'is_indexable' => 1
                        ]);

                        foreach($categories as $category){

                            $uri = '/'. $category->getSlug();
                            $priority = $category->getPriority();

                            $urls[] = ['loc' => $uri, 'lastmod' => $lastmod, 'changefreq' => $change, 'priority' => $priority];

                        }

                        break;

                    case 'PageProduct':

                        $products = $this->getDoctrine()->getRepository(Product::class)->findBy([
                            'is_enabled' => 1,
                            'is_indexable' => 1
                        ]);

                        foreach($products as $product){

                            $uri = '/'. $product->getSlug();
                            $priority = $product->getPriority();

                            $urls[] = ['loc' => $uri, 'lastmod' => $lastmod, 'changefreq' => $change, 'priority' => $priority];

                        }

                        break;

                    default:

                        $urls[] = ['loc' => $page->getUri(), 'lastmod' => $lastmod, 'changefreq' => $change, 'priority' => $page->getPriority()];
                        break;
                }


            }
        }

        return $this->render('@core/sitemap.html.twig', [
            'urls' => $urls,
            'hostname' => $request->getHost()
        ]);
    }

}
