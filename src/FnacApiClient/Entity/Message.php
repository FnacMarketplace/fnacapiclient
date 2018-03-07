<?php
/*
 * This file is part of the fnacMarketPlace APi Client.
 * (c) 2011 Fnac
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FnacApiClient\Entity;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizableInterface;

use FnacApiClient\Type\MessageActionType;

/**
 * Message definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class Message extends Entity
{
    /** Send Var **/
    private $action;
    private $message_to;
    private $message_type;

    /** Get Var **/
    private $message_referer;
    private $message_referer_type;
    private $message_offer_title;
    private $message_from;
    private $message_from_type;
    private $created_at;
    private $updated_at;
    private $state;
    private $archived;
    private $answer;
    private $answer_at;

    /** Both **/
    private $message_id;
    private $message_subject;
    private $message_description;

    /**
     * {@inheritDoc}
     */
    public function normalize(NormalizerInterface $normalizer, $format = null, array $context = array())
    {
        $data = array();

        $data['@action'] = $this->action;
        $data['@id'] = $this->message_id;

        if ($this->action == MessageActionType::REPLY) {
            $data['message_to'] = $this->message_to;
            $data['message_subject'] = $this->message_subject;
            $data['message_description'] = $this->message_description;
            $data['message_type'] = $this->message_type;
        }

        if ($this->action == MessageActionType::CREATE) {
            $data['message_to'] = $this->message_to;
            $data['message_subject'] = $this->message_subject;
            $data['message_description'] = $this->message_description;
            $data['message_type'] = $this->message_type;
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function denormalize(DenormalizerInterface $denormalizer, $data, $format = null, array $context = array())
    {
        $this->message_referer = $data['message_referer']['#'];
        $this->message_referer_type = $data['message_referer']['@type'];
        $this->message_from = $data['message_from']['#'];
        $this->message_from_type = $data['message_from']['@type'];
        $this->created_at = $data['created_at'];
        $this->updated_at = $data['updated_at'];
        $this->state = $data['@state'];
        $this->archived = $data['@archived'];
        $this->message_id = $data['message_id'];
        $this->message_subject = $data['message_subject'];
        $this->message_description = $data['message_description'];

        $this->message_offer_title = isset($data['message_offer_title']) ? $data['message_offer_title'] : "";
        $this->answer = isset($data['answer']) ? $data['answer'] : "";
        $this->answer_at = isset($data['answer_at']) ? $data['answer_at'] : "";
    }

    /**
     * Order or Offer unique identifier for message
     *
     * @return string
     */
    public function getMessageReferer()
    {
        return $this->message_referer;
    }

    /**
     * Type of Referer : Order or Offer
     *
     * @see FnacApiClient\Type\MessageType
     *
     * @return string
     */
    public function getMessageRefererType()
    {
        return $this->message_referer_type;
    }

    /**
     * Sender's name
     *
     * @return string
     */
    public function getMessageFrom()
    {
        return $this->message_from;
    }

    /**
     * Sender's type
     *
     * @see FnacApiClient\Type\MessageFromType
     *
     * @return string
     */
    public function getMessageFromType()
    {
        return $this->message_from_type;
    }

    /**
     * Creation date of message
     *
     * @return date
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Last update date
     *
     * @return date
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Is the message Read or Unread
     *
     * @see FnacApiClient\Type\MessageStateType
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Is message archived or not
     *
     * @see FnacApiClient\Type\BoolType
     *
     * @return string
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Message unique identifier
     *
     * @return string
     */
    public function getMessageId()
    {
        return $this->message_id;
    }

    /**
     * Message's subject
     *
     * @see FnacApiClient\Type\MessageSubjectType
     *
     * @return string
     */
    public function getMessageSubject()
    {
        return $this->message_subject;
    }

    /**
     * Message's content
     *
     * @return string
     */
    public function getMessageDescription()
    {
        return $this->message_description;
    }

    /**
     * Set action to do on message
     *
     * @see FnacApiClient\Type\MessageActionType
     *
     * @param string $action : Action to do on message
     */
    public function setAction($action)
    {
        $this->action = $action;
    }

    /**
     * Set message's unique identifier
     *
     * @param string $message_id : Message uid
     */
    public function setMessageId($message_id)
    {
        $this->message_id = $message_id;
    }

    /**
     * Set message subject
     *
     * @see FnacApiClient\Type\MessageSubjectType
     *
     * @param string $message_subject : Subject for reply
     */
    public function setMessageSubject($message_subject)
    {
        $this->message_subject = $message_subject;
    }

    /**
     * Set to who we want to reply
     *
     * @see FnacApiClient\Type\MessageToType
     *
     * @param string $message_to : Person to reply
     */
    public function setMessageTo($message_to)
    {
        $this->message_to = $message_to;
    }

    /**
     * Set messsage's content
     *
     * @param string $message_description : Content of reply
     */
    public function setMessageDescription($message_description)
    {
        $this->message_description = $message_description;
    }

    /**
     * Set message's type
     *
     * @see FnacApiClient\Type\MessageType;
     *
     * @param string $message_type : Type of message
     */
    public function setMessageType($message_type)
    {
        $this->message_type = $message_type;
    }

    /**
     * Message's offer title if referer type is Offer
     *
     * @return string
     */
    public function getMessageOfferTitle()
    {
        return $this->message_offer_title;
    }

    /**
     * Message's answer
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Message's anwser date
     *
     * @return date
     */
    public function getAnswerAt()
    {
        return $this->answer_at;
    }
}
