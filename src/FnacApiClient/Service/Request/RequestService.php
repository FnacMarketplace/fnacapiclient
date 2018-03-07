<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use FnacApiClient\Service\AbstractService;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use FnacApiClient\Toolbox\StringObject;

/**
 * RequestService service base definition for request.
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class RequestService extends AbstractService
{
    const CLASS_RESPONSE = null;
    const XSD_FILE = null;

    /**
     * Create service with supplied parameters
     *
     * Paremeters key are class setter transform from camel case to undescore string (@see FnacApiClient\Toolbox\StringObject )
     * Example :
     * setOrderFnacId(1) => array('order_fnac_id' => 1)
     *
     * This allow you to set parameters in the way you want
     *
     * @param array $parameters Parmeters list
     */
    public function __construct(array $parameters = null)
    {
        if (!empty($parameters)) {
            $this->initParameters($parameters);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        throw new BadMethodCallException("Can't denormalize a Request Service");
    }

    /**
     * Get the response class excepted for a request
     *
     * @return string
     */
    final public function getClassResponse()
    {
        if (static::CLASS_RESPONSE === null) {
            throw new \LogicException(sprintf("Excepted reponse must be defined in %s", get_class($this)));
        }

        if (is_subclass_of(static::CLASS_RESPONSE, 'ResponseService')) {
            throw new \LogicException(sprintf("Reponse class %s must be a sub class of ReponseService", static::CLASS_RESPONSE));
        }
        return static::CLASS_RESPONSE;
    }

    /**
     * Check if xml generated is valid for the xsd file
     *
     * @param string $xml Xml generated
     * @return boolean
     */
    final public function checkXML($xml)
    {
        if (static::XSD_FILE === null) {
            throw new \LogicException(sprintf("XSD file must be defined in %s", get_class($this)));
        }

        $xsdPath = __DIR__ . '/../../Resources/xsd/' . static::XSD_FILE;

        if (!file_exists($xsdPath)) {
            throw new \LogicException(sprintf("XSD file %s doesn't exist", $xsdPath));
        }

        $doc = new \DOMDocument();
        $doc->loadXML($xml);

        libxml_use_internal_errors(true);

        if (!$doc->schemaValidate($xsdPath)) {
            $errorList = libxml_get_errors();
            libxml_clear_errors();
            throw new \Exception(sprintf("Errors when validating the xml document : %s", print_r($errorList, true)));
        }

        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        return array(
            '@xmlns' => static::FNAC_XMLNS
        );
    }

    /**
     * Convert parameter from array to set method
     *
     * Paremeters key are class setter transform from camel case to undescore string (@see FnacApiClient\Toolbox\StringObject )
     * Example :
     * setOrderFnacId(1) => array('order_fnac_id' => 1)
     *
     * @param Array $parameters : List of parameter where key is the method name and value the data to set.
     */
    public function initParameters(array $parameters)
    {
        foreach ($parameters as $getter => $param) {
            $setter = 'set' . StringObject::toCamelCase($getter);

            if (method_exists($this, $setter)) {
                $this->$setter($param);
            }
        }
    }
}
