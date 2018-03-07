<?php
/*
 * This file is part of the fnacApi.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Service\Response;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

use FnacApiClient\Entity\Message;

/**
 * MessageQueryResponse service base definition for response when using message query.
 *
 * @author     Fnac
 * @version    1.0.0
 */
class MessageQueryResponse extends QueryResponse
{
    private $messages;
    private $messages_unread_result;
    private $messages_read_result;

    /**
     * {@inheritdoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        parent::denormalize($denormalizer, $data, $format);

        $this->messages_unread_result = isset($data['messages_unread_result']) ? $data['messages_unread_result'] : null;
        $this->messages_read_result = isset($data['messages_read_result']) ? $data['messages_read_result'] : null;

        $this->messages = new \ArrayObject();

        if (isset($data['message'])) {
            if (isset($data['message'][0])) {
                foreach ($data['message'] as $message) {
                    $tmpObj = new Message();
                    $tmpObj->denormalize($denormalizer, $message, $format);
                    $this->messages[] = $tmpObj;
                }
            } elseif (!empty($data['incident'])) {
                $tmpObj = new Message();
                $tmpObj->denormalize($denormalizer, $data['message'], $format);
                $this->messages[] = $tmpObj;
            }
        }
    }

    /**
     * Message list
     *
     * @see FnacApiClient\Entity\Message
     *
     * @return Array<Message>
     */
    public function getMessages()
    {
        return $this->messages;
    }

    /**
     * Number of messages unread
     *
     * @return integer
     */
    public function getMessagesUnreadResult()
    {
        return $this->messages_unread_result;
    }

    /**
     * Number of messages read
     *
     * @return integer
     */
    public function getMessagesReadResult()
    {
        return $this->messages_read_result;
    }
}
