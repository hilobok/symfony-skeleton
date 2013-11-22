<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array_map(function($class) { return new $class; },
            array_unique($this->processRequiredBundles(array(
                'Symfony\Bundle\FrameworkBundle\FrameworkBundle',
                'Symfony\Bundle\SecurityBundle\SecurityBundle',
                'Symfony\Bundle\TwigBundle\TwigBundle',
                'Symfony\Bundle\MonologBundle\MonologBundle',
                'Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle',
                'Symfony\Bundle\AsseticBundle\AsseticBundle',
                'Doctrine\Bundle\DoctrineBundle\DoctrineBundle',
                'Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle',

                'Anh\SiteBundle\AnhSiteBundle',
            )))
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }

    private function processRequiredBundles($requiredBundles)
    {
        foreach ($requiredBundles as $class) {
            $callable = sprintf('%s::getRequiredBundles', $class);

            if (is_callable($callable)) {
                $requiredBundles = array_merge(
                    $requiredBundles,
                    $this->processRequiredBundles(call_user_func($callable))
                );
            }
        }

        return $requiredBundles;
    }
}
