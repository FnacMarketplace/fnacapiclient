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

/**
 * Class to use when retrieves multiple result (implement date, paging and limitation)
 *
 * @author     Fnac
 * @version    1.0.0
 */
abstract class Query extends Authentified
{
    protected $paging = null;
    protected $date_min = null;
    protected $date_type = null;
    protected $results_count = null;
    protected $date_max = null;

    /**
     * Set page number to fetch
     *
     * @param string $paging Page number
     * @return void
     */
    public function setPaging($paging)
    {
        $this->paging = $paging;
    }

    /**
     * Set the maximum number of results to retrieve
     *
     * @param string $results_count Maximum number of results
     * @return void
     */
    public function setResultsCount($results_count)
    {
        $this->results_count = $results_count;
    }

    /**
     * Set period from which object to query has been created or updated
     *
     * @param array $date Period query Array formulation : array('type' => 'date type', 'min' => 'min date', 'max' => 'max_date')
     * @see FnacApiClient\Type\DateType
     * @return void
     */
    public function setDate(array $date)
    {
        $this->date_type = $date['type'];
        $this->date_min = $date['min'];
        $this->date_max = $date['max'];
    }

    /**
     * {@inheritdoc}
     */
    public function normalize(SerializerInterface $serializer, $format = null)
    {
        $query = parent::normalize($serializer, $format);

        if (!is_null($this->results_count)) {
            $query['@results_count'] = $this->results_count;
        }

        if (!is_null($this->paging)) {
            $query['paging'] = $this->paging;
        }

        if (!is_null($this->date_type) || !is_null($this->date_min) || !is_null($this->date_max)) {
            $query['date'] = array();
        }

        if (!is_null($this->date_type)) {
            $query['date']['@type'] = $this->date_type;
        }

        if (!is_null($this->date_min)) {
            $query['date']['min'] = $this->date_min;
        }

        if (!is_null($this->date_max)) {
            $query['date']['max'] = $this->date_max;
        }

        return $query;
    }
}
