<?php

namespace Anh\SiteBundle\EventListener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class DateFormatListener
{
    protected $container;

    /**
     * Constructor
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Set the default date format for twig
     *
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        $dateTimeFormat = $this->container->getParameter('anh_site.date_format');
        $this->container->get('twig')->getExtension('core')->setDateFormat($dateTimeFormat, '%d days');
    }
}