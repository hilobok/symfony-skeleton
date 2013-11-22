<?php

namespace Anh\SiteBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class DateFormatListener
{
    protected $twig;
    protected $dateFormat;

    /**
     * Constructor
     */
    public function __construct(\Twig_Environment $twig, $dateFormat)
    {
        $this->twig = $twig;
        $this->dateFormat = $dateFormat;
    }

    /**
     * Set the default date format for twig
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $this->twig->getExtension('core')->setDateFormat($this->dateFormat);
    }
}