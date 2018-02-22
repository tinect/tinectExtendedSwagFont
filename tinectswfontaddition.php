<?php

namespace tinectswfontaddition;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Query\QueryBuilder;
use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Console\Application;
use Shopware\Components\Theme\LessDefinition;
use Shopware_Controllers_Frontend_Finishing;

class tinectswfontaddition extends Plugin
{


    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
    }


    public static function getSubscribedEvents()
    {

        return [
            'Theme_Compiler_Collect_Plugin_Less' => 'addLess',
        ];
    }


    public function addLess(\Enlight_Event_EventArgs $args)
    {
        return new LessDefinition(
            [],
            [
                __DIR__ . '/Resources/views/frontend/_public/src/less/all.less',
            ]
        );
    }


}

?>