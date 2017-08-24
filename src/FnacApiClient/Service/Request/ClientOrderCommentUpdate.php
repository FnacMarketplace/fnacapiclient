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
use FnacApiClient\Entity\Comment;

/**
 * ClientOrderCommentUpdate Service's definition.
 *
 * @author     Fnac
 * @version    1.0.0
 */

class ClientOrderCommentUpdate extends Authentified
{
    const ROOT_NAME = "client_order_comments_update";
    const XSD_FILE = "ClientOrderCommentsUpdateService.xsd";
    const CLASS_RESPONSE = "FnacApiClient\Service\Response\ClientOrderCommentUpdateResponse";

    private $comments;

    /**
     * {@inheritdoc}
     */
    public function __construct(array $parameters = null)
    {
        parent::__construct($parameters);

        $this->comments = new \ArrayObject();
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $data = parent::normalize($serializer, $format);

        $data['comment'] = array();

        if ($this->comments->count() > 1) {
            foreach ($this->comments as $coment) {
                $data['comment'][] = $comment->normalize($serializer, $format);
            }
        } elseif ($this->comments->count()) {
            $data['comment'] = $this->comments[0]->normalize($serializer, $format);
        }

        return $data;
    }

    /**
     * Add comment to update
     *
     * @param Comment $comment Comment to update
     * @return void
     */
    public function addComment(Comment $comment)
    {
        $this->comments[] = $comment;
    }
}
