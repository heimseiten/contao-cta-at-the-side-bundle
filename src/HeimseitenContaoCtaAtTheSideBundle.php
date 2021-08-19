<?php

declare(strict_types=1);

/*
 * This file is part of call to action at the side of the page.
 * 
 * (c) heimseiten.de - Webdesign aus Köln 2021 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-cta-at-the-side-bundle
 */

namespace Heimseiten\ContaoCtaAtTheSideBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class HeimseitenContaoCtaAtTheSideBundle
 */
class HeimseitenContaoCtaAtTheSideBundle extends Bundle
{
	/**
	 * {@inheritdoc}
	 */
	public function build(ContainerBuilder $container): void
	{
		parent::build($container);
		
	}
}
