<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\SerializerInterface;

use FnacApiClient\Entity\MessageUpdate;

/**
 * MessageUpdateResponse service base definition for message update response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageUpdateResponse extends ResponseService
{
    private $messages;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->messages = new \ArrayObject();

        if (isset($data['message'])) {
            if (isset($data['message'][0])) {
                foreach ($data['message'] as $message) {
                    $tmpObj = new MessageUpdate();
                    $tmpObj->denormalize($serializer, $message, $format);
                    $this->messages[] = $tmpObj;
                }
            } elseif (!empty($data['message'])) {
                $tmpObj = new MessageUpdate();
                $tmpObj->denormalize($serializer, $data['message'], $format);
                $this->messages[] = $tmpObj;
            }
        }
    }

    /**
     * Message updated list
     *
     * @see FnacApiClient\Entity\MessageUpdate
     *
     * @return ArrayObject<MessageUpdate>
     */
    public function getMessagesUpdates()
    {
        return $this->messages;
    }
}
