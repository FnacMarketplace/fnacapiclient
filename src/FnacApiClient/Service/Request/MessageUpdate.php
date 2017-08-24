<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Request;

use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\Message;

/**
 * MessageUpdate Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class MessageUpdate extends Authentified
{
    const ROOT_NAME = "messages_update";
    const XSD_FILE = "MessagesUpdateService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\MessageUpdateResponse";

    private $messages = array();

    /**
     * {@inheritdoc}
     */
    public function __construct(array $parameters = null)
    {
        parent::__construct($parameters);

        $this->messages = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data = parent::normalize($serializer, $format);

        $data['message'] = array();

        if ($this->messages->count() > 1) {
            foreach ($this->messages as $message) {
                $data['message'][] = $message->normalize($serializer, $format);
            }
        } elseif ($this->messages->count()) {
            $data['message'] = $this->messages[0]->normalize($serializer, $format);
        }

        return $data;
    }

    /**
     * Add message to update
     *
     * @param Message $message Message to update
     */
    public function addMessage(Message $message)
    {
        $this->messages[] = $message;
    }
}
