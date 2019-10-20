<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace Temando\Shipping\Api\Data\Rma;

/**
 * RMA Shipment Reference Interface.
 *
 * A shipment reference represents the link between local return shipment and
 * a return shipment entity at the Temando platform.
 *
 * @api
 * @package  Temando\Shipping\Api
 * @author   Nathan Wilson <nathan.wilson@temando.com>
 * @license  https://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link     https://www.temando.com/
 */
interface RmaShipmentReferenceInterface
{
    const RMA_ENTITY_ID   = 'entity_id';
    const EXT_SHIPMENT_ID = 'ext_shipment_id';

    /**
     * @return int
     */
    public function getRmaEntityId();

    /**
     * @param int $entityId
     * @return void
     */
    public function setRmaEntityId($entityId);

    /**
     * @return string
     */
    public function getExtShipmentId();

    /**
     * @param string $extShipmentId
     * @return void
     */
    public function setExtShipmentId($extShipmentId);
}
