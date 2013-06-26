<?php

namespace Modu\Bundle\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ModuSiteBundle:Default:index.html.twig');
    }
}
