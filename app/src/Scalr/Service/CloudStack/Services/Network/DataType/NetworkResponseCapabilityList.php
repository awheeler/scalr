<?php
namespace Scalr\Service\CloudStack\Services\Network\DataType;

use Scalr\Service\CloudStack\DataType\AbstractListDataType;

/**
 * NetworkResponseCapabilityList
 *
 * @author    Vlad Dobrovolskiy   <v.dobrovolskiy@scalr.com>
 * @since     4.5.2
 *
 */
class NetworkResponseCapabilityList extends AbstractListDataType
{

    /**
     * {@inheritdoc}
     * @see Scalr\Service\CloudStack\DataType.AbstractListDataType::getClass()
     */
    public function getClass()
    {
        return __NAMESPACE__ . '\\NetworkResponseCapabilityData';
    }

}