<?php

/**
 * This file is part of blackforest/piwik-bundle.
 *
 * (c) 2014-2018 The BlackForest team.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * This project is provided in good faith and hope to be usable by anyone.
 *
 * @package    blackforest/piwik-bundle
 * @author     Sven Baumann <baumann.sv@gmail.com>
 * @copyright  2014-2018 The BlackForest team.
 * @license    hhttps://github.com/BlackForest/piwik-bundle/blob/master/LICENSE LGPL-3.0
 * @filesource
 */

namespace BlackForest\PiwikBundle\Test;

use BlackForest\PiwikBundle\BlackForestPiwikBundle;
use BlackForest\PiwikBundle\DependencyInjection\BlackForestPiwikExtension;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Config\Resource\ComposerResource;
use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class BlackForestPiwikBundleTest
 *
 * @covers \BlackForest\PiwikBundle\BlackForestPiwikBundle
 */
class BlackForestPiwikBundleTest extends TestCase
{
    public function testCanBeInstantiated()
    {
        $bundle = new BlackForestPiwikBundle();

        $this->assertInstanceOf(BlackForestPiwikBundle::class, $bundle);
    }

    public function testReturnsTheContainerExtension()
    {
        $extension = (new BlackForestPiwikBundle())->getContainerExtension();

        $this->assertInstanceOf(BlackForestPiwikExtension::class, $extension);
    }

    /**
     * @covers \BlackForest\PiwikBundle\DependencyInjection\BlackForestPiwikExtension::load
     */
    public function testLoadExtensionConfiguration()
    {
        $extension = (new BlackForestPiwikBundle())->getContainerExtension();
        $container = new ContainerBuilder();

        $extension->load([], $container);

        $this->assertInstanceOf(ComposerResource::class, $container->getResources()[0]);
        $this->assertInstanceOf(FileResource::class, $container->getResources()[1]);
        $this->assertSame(
            \dirname(\dirname(__DIR__)) . '/src/Resources/config/services.yml',
            $container->getResources()[1]->getResource()
        );
    }
}
