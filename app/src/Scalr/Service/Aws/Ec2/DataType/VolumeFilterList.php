<?php
namespace Scalr\Service\Aws\Ec2\DataType;

use Scalr\Service\Aws\Ec2\Ec2ListDataType;

/**
 * VolumeFilterList
 *
 * @author   Vitaliy Demidov   <vitaliy@scalr.com>
 * @since    21.01.2013
 */
class VolumeFilterList extends Ec2ListDataType
{
    /**
     * Constructor
     *
     * @param array|VolumeFilterData  $aListData VolumeFilterData List
     */
    public function __construct($aListData = null)
    {
        parent::__construct($aListData, array('name', 'value'), __NAMESPACE__ . '\\VolumeFilterData');
    }

    /**
     * {@inheritdoc}
     * @see Scalr\Service\Aws\DataType.ListDataType::getQueryArray()
     */
    public function getQueryArray($uriParameterName = 'Filter', $member = true)
    {
        return parent::getQueryArray($uriParameterName, $member);
    }
}