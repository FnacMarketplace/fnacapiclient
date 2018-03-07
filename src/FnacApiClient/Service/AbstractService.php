<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service;

use Symfony\Component\Serializer\Normalizer\DenormalizableInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

/**
 * fnacService service base definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class AbstractService implements NormalizableInterface, DenormalizableInterface
{
    /**
     * Fnac namespace xml url
     * @var string
     */
    const FNAC_XMLNS = "http://www.fnac.com/schemas/mp-dialog.xsd";

    /**
     * Base service name
     * @var string
     */
    const ROOT_NAME = null;

    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        // TODO: Implement normalize() method.
    }

    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        // TODO: Implement denormalize() method.
    }

    /**
     * Get service name
     *
     * This service name represent the base name element for each service and last part of url
     *
     * @return string
     */
    final public function getServiceName()
    {        
        if (static::ROOT_NAME === null) {
            throw new \LogicException(sprintf("Constant root name must be defined in class %s", get_class($this)));
        }
        return static::ROOT_NAME;
    }
    
    
    final public function getClassName() {
        
        $reflexion = new \ReflectionClass($this);
        return $reflexion->getShortName();
    }
}
