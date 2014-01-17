<?php

namespace Anh\SiteBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class AnhSiteBundle extends Bundle
{
    public static function getRequiredBundles()
    {
        return array(
            'Sp\BowerBundle\SpBowerBundle',
        );
    }
}
