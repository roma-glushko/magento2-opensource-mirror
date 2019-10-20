<?php
/**
 * Refer to LICENSE.txt distributed with the Temando Shipping module for notice of license
 */
namespace Temando\Shipping\ViewModel\Dispatch;

use Magento\Framework\UrlInterface;
use Magento\Framework\View\Element\Block\ArgumentInterface;
use Temando\Shipping\Api\Data\Rma\RmaShipmentReferenceInterfaceFactory;
use Temando\Shipping\Model\ResourceModel\Rma\RmaShipment;
use Temando\Shipping\Model\Rma\RmaShipmentReference;

/**
 * View model for dispatch solve page.
 *
 * @package Temando\Shipping\ViewModel
 * @author  Nathan Wilson <nathan.wilson@temando.com>
 * @license https://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link    https://www.temando.com/
 */
class DispatchSolve implements ArgumentInterface
{
    /**
     * @var UrlInterface
     */
    private $urlBuilder;

    /**
     * @var RmaShipmentReferenceInterfaceFactory
     */
    private $rmaShipmentFactory;

    /**
     * @var RmaShipment
     */
    private $resourceRma;

    /**
     * DispatchSolve constructor.
     * @param RmaShipmentReferenceInterfaceFactory $rmaShipmentFactory
     * @param RmaShipment $resourceRma
     */
    public function __construct(
        UrlInterface $urlBuilder,
        RmaShipmentReferenceInterfaceFactory $rmaShipmentFactory,
        RmaShipment $resourceRma
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->rmaShipmentFactory = $rmaShipmentFactory;
        $this->resourceRma = $resourceRma;
    }

    /**
     * Build the return shipment URL
     *
     * @param $extShipmentId
     * @return string
     */
    public function getShipmentUrl($extShipmentId): string
    {
        $returnShipment = $this->getReturnShipment($extShipmentId);
        if ($returnShipment && $returnShipment->getRmaId()) {
            return $this->urlBuilder->getUrl('temando/rma_shipment/view', ['rma_id' => $returnShipment->getRmaId(), 'ext_shipment_id' => $extShipmentId]);
        }

        return $this->urlBuilder->getUrl('temando/shipment/view', ['shipment_id' => $extShipmentId]);
    }

    /**
     * Retrieve a return shipment
     *
     * @param $extShipmentId
     * @return RmaShipmentReference|null
     */
    private function getReturnShipment($extShipmentId): ?RmaShipmentReference
    {
        $rmaShipment = $this->rmaShipmentFactory->create();
        try {
            $this->resourceRma->load($rmaShipment, $extShipmentId);
        } catch (\Exception $exception) {
            return null;
        }

        return $rmaShipment;
    }
}
