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

use FnacApiClient\Entity\Comment;

/**
 * ClientOrderCommentUpdateResponse service base definition for client order comment update response
 *
 * @author     Fnac
 * @version    1.0.0
 */
class ClientOrderCommentUpdateResponse extends ResponseService
{
    private $comments;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data, $format);

        $this->comments = new \ArrayObject();

        if (isset($data['comment'])) {
            if (isset($data['comment'][0])) {
                foreach ($data['comment'] as $comment) {
                    $tmpObj = new Comment();
                    $tmpObj->denormalize($serializer, $comment, $format);
                    $this->comments[] = $tmpObj;
                }
            } elseif (!empty($data['comment'])) {
                $tmpObj = new Comment();
                $tmpObj->denormalize($serializer, $data['comment'], $format);
                $this->comments[] = $tmpObj;
            }
        }
    }

    /**
     * List of comment updated
     *
     * @see FnacApiClient\Entity\Comment
     *
     * @return ArrayObject<Comment>
     */
    public function getComments()
    {
        return $this->comments;
    }
}
