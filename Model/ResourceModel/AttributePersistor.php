<?php
/**
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this module to newer
 * versions in the future.
 *
 * @category  Smile
 * @package   Smile\Seller
 * @author    Aurelien FOUCRET <aurelien.foucret@smile.fr>
 * @copyright 2016 Smile
 * @license   Open Software License ("OSL") v. 3.0
 */

namespace Smile\Seller\Model\ResourceModel;

use Magento\Framework\Model\Entity\ScopeInterface;
use Magento\Eav\Model\Entity\Attribute\AbstractAttribute;
use Smile\Seller\Api\Data\SellerAttributeInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;

/**
 * Seller Attributes Persistor
 *
 * @category Smile
 * @package  Smile\Seller
 * @author   Aurelien FOUCRET <aurelien.foucret@smile.fr>
 */
class AttributePersistor extends \Magento\Eav\Model\ResourceModel\AttributePersistor
{
    /**
     * Retrieve a scoped value for an attribute
     *
     * @param \Magento\Framework\Model\Entity\ScopeInterface        $scope      The scope
     * @param \Magento\Eav\Model\Entity\Attribute\AbstractAttribute $attribute  The attribute
     * @param bool                                                  $useDefault If should use default
     *
     * @return string
     */
    protected function getScopeValue(ScopeInterface $scope, AbstractAttribute $attribute, $useDefault = false)
    {
        if ($attribute instanceof SellerAttributeInterface) {
            $useDefault = $useDefault || $attribute->isScopeGlobal();
        }

        return parent::getScopeValue($scope, $attribute, $useDefault);
    }
}
