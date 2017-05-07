<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\Twig\Tests\Extension;

use Symfony\Bridge\Twig\Form\TwigRenderer;

trait RuntimeLoaderProvider
{
    protected function registerTwigRuntimeLoader(\Twig_Environment $environment, TwigRenderer $renderer)
    {
        $loader = $this->getMockBuilder('Twig_RuntimeLoaderInterface')->getMock();
        $loader->expects($this->any())->method('load')->will($this->returnValueMap(array(
            array('Symfony\Bridge\Twig\Form\TwigRenderer', $renderer),
        )));
        $environment->addRuntimeLoader($loader);
    }
}
