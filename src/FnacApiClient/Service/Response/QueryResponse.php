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

/**
 * QueryResponse service base definition for query response
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class QueryResponse extends ResponseService
{
    private $page;
    private $total_paging;
    private $nb_total_per_page;
    private $nb_total_result;

    /**
     * {@inheritdoc}
     */
    public function denormalize(SerializerInterface $serializer, $data, $format = null)
    {
        parent::denormalize($serializer, $data);

        $this->page = isset($data['page']) ? $data['page'] : 0;
        $this->total_paging = isset($data['total_paging']) ? $data['total_paging'] : 0;
        $this->nb_total_per_page = isset($data['nb_total_per_page']) ? $data['nb_total_per_page'] : 0;
        $this->nb_total_result = isset($data['nb_total_result']) ? $data['nb_total_result'] : 0;
    }

    /**
     * Page number
     *
     * @return integer
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Number of page available
     *
     * @return integer
     */
    public function getTotalPaging()
    {
        return $this->total_paging;
    }

    /**
     * Number of result per page
     *
     * @return integer
     */
    public function getNbTotalPerPage()
    {
        return $this->nb_total_per_page;
    }

    /**
     * Number of result
     *
     * @return integer
     */
    public function getNbTotalResult()
    {
        return $this->nb_total_result;
    }

    /**
     * Is the query have other result to be fetched ?
     *
     * @return boolean
     */
    public function hasNextPage()
    {
        return (boolean) ($this->page < $this->total_paging);
    }
}
