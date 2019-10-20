<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace Temando\Shipping\Model\Rma;

use Magento\Framework\Model\AbstractModel;
use Temando\Shipping\Api\Data\Rma\RmaShipmentReferenceInterface;
use Temando\Shipping\Model\ResourceModel\Rma\RmaShipment as RmaShipmentResource;

/**
 * Reference to RMA shipment entity created at Temando platform
 *
 * @package Temando\Shipping\Model
 * @author  Nathan Wilson <nathan.wilson@temando.com>
 * @license https://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link    https://www.temando.com/
 */
class RmaShipmentReference extends AbstractModel implements RmaShipmentReferenceInterface
{
    /**
     * Init resource model.
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->_init(RmaShipmentResource::class);
    }

    /**
     * @return int
     */
    public function getRmaEntityId()
    {
        return $this->getData(RmaShipmentReferenceInterface::RMA_ENTITY_ID);
    }

    /**
     * @param int $entityId
     * @return void
     */
    public function setRmaEntityId($entityId)
    {
        $this->setData(RmaShipmentReferenceInterface::RMA_ENTITY_ID, $entityId);
    }

    /**
     * @return string
     */
    public function getExtShipmentId()
    {
        return $this->getData(RmaShipmentReferenceInterface::EXT_SHIPMENT_ID);
    }

    /**
     * @param string $extShipmentId
     * @return void
     */
    public function setExtShipmentId($extShipmentId)
    {
        $this->setData(RmaShipmentReferenceInterface::EXT_SHIPMENT_ID, $extShipmentId);
    }
}
