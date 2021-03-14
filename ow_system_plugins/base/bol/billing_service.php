<?php

/**
 * EXHIBIT A. Common Public Attribution License Version 1.0
 * The contents of this file are subject to the Common Public Attribution License Version 1.0 (the “License”);
 * you may not use this file except in compliance with the License. You may obtain a copy of the License at
 * http://www.oxwall.org/license. The License is based on the Mozilla Public License Version 1.1
 * but Sections 14 and 15 have been added to cover use of software over a computer network and provide for
 * limited attribution for the Original Developer. In addition, Exhibit A has been modified to be consistent
 * with Exhibit B. Software distributed under the License is distributed on an “AS IS” basis,
 * WITHOUT WARRANTY OF ANY KIND, either express or implied. See the License for the specific language
 * governing rights and limitations under the License. The Original Code is Oxwall software.
 * The Initial Developer of the Original Code is Oxwall Foundation (http://www.oxwall.org/foundation).
 * All portions of the code written by Oxwall Foundation are Copyright (c) 2011. All Rights Reserved.

 * EXHIBIT B. Attribution Information
 * Attribution Copyright Notice: Copyright 2011 Oxwall Foundation. All rights reserved.
 * Attribution Phrase (not exceeding 10 words): Powered by Oxwall community software
 * Attribution URL: http://www.oxwall.org/
 * Graphic Image as provided in the Covered Code.
 * Display of Attribution Information is required in Larger Works which are defined in the CPAL as a work
 * which combines Covered Code or portions thereof with code not governed by the terms of the CPAL.
 */

/**
 * Billing Service
 *
 * @author Egor Bulgakov, Sergey Pryadkin <egor.bulgakov@gmail.com, GiperProger@gmail.com>
 * @package ow.ow_system_plugins.base.bol
 * @since 1.0
 */
final class BOL_BillingService
{
    const EVENT_ON_AFTER_INIT_SALE = "base.billing.after_init_sale";
    const EVENT_ON_AFTER_DELIVER_SALE = "base.billing.on_after_delivered_sale";
    const EVENT_ON_COLLECT_GATEWAYS_LIST = "base.billing.on_collect_gateways_list";


    /**
     * @var BOL_BillingSaleDao
     */
    private $billingSaleDao;
    /**
     * @var BOL_BillingGatewayDao
     */
    private $billingGatewayDao;
    /**
     * @var BOL_BillingGatewayConfigDao
     */
    private $billingGatewayConfigDao;
    /**
     * @var BOL_BillingGatewayProductDao
     */
    private $billingGatewayProductDao;
    /**
     * @var BOL_BillingProductDao
     */
    private $billingProductDao;
    /**
     * @var BOL_BillingService
     */
    private static $classInstance;

    /**
     * Class constructor
     */
    private function __construct()
    {
        $this->billingSaleDao = BOL_BillingSaleDao::getInstance();
        $this->billingGatewayDao = BOL_BillingGatewayDao::getInstance();
        $this->billingGatewayConfigDao = BOL_BillingGatewayConfigDao::getInstance();
        $this->billingGatewayProductDao = BOL_BillingGatewayProductDao::getInstance();
        $this->billingProductDao = BOL_BillingProductDao::getInstance();
    }

    /**
     * Singleton instance.
     *
     * @return BOL_BillingService
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }
    /* Billing sale methods */

    /**
     * Returns sale by Id
     * 
     * @param $saleId
     * @return BOL_BillingSale
     */
    public function getSaleById( $saleId )
    {
        return $this->billingSaleDao->findById($saleId);
    }

    /**
     * Finds sale by hash
     * 
     * @param $hash
     * @return BOL_BillingSale
     */
    public function getSaleByHash( $hash )
    {
        if ( !mb_strlen($hash) )
        {
            return null;
        }

        return $this->billingSaleDao->findByHash($hash);
    }

    /**
     * Checks if sale has already been delivered to avoid sale duplication
     *
     * @param string $transId
     * @param $gatewayId
     * @return boolean
     */
    public function saleDelivered( $transId, $gatewayId )
    {
        $sale = $this->billingSaleDao->findByGatewayTransactionId($transId, $gatewayId);

        if ( !$sale || $sale->status != BOL_BillingSaleDao::STATUS_DELIVERED )
        {
            return false;
        }

        return true;
    }

    /**
     * Finds sale by transaction Id
     * 
     * @param string $gatewayKey
     * @param string $transId
     * @return BOL_BillingSale
     */
    public function getSaleByGatewayTransactionId( $gatewayKey, $transId )
    {
        if ( !mb_strlen($gatewayKey) || !mb_strlen($transId) )
        {
            return null;
        }

        $gateway = $this->billingGatewayDao->findByKey($gatewayKey);

        if ( !$gateway )
        {
            return null;
        }

        return $this->billingSaleDao->findByGatewayTransactionId($transId, $gateway->id);
    }

    /**
     * Initializes sale
     * 
     * @param $sale
     * @param $gatewayKey
     * @return string
     */
    public function initSale( BOL_BillingSale $sale, $gatewayKey )
    {
        $sale->status = BOL_BillingSaleDao::STATUS_INIT;
        
        if ( !isset($sale->hash) )
        {
            $sale->hash = $this->getMD5Hash();
        }
        
        $sale->timeStamp = time();

        if ( !isset($sale->currency) )
        {
            $sale->currency = $this->getActiveCurrency();
        }
        if ( !isset($sale->quantity) )
        {
            $sale->quantity = 1;
        }

        if ( !isset($sale->totalAmount) )
        {
            $sale->totalAmount = floatval($sale->price * $sale->quantity);
        }

        $gateway = $this->findGatewayByKey($gatewayKey);
        $sale->gatewayId = $gateway->id;

        $this->billingSaleDao->save($sale);
        
        
        $event = new OW_Event(self::EVENT_ON_AFTER_INIT_SALE, array("saleDbo" => $sale, "gateway" => $gateway));
        OW::getEventManager()->trigger($event);
        
        
        return $sale->id;
    }

    /**
     * Prepares sale
     * 
     * @param $adapter
     * @param $sale
     * @return bool
     */
    public function prepareSale( OW_BillingAdapter $adapter, BOL_BillingSale $sale )
    {
        if ( !$this->getSaleById($sale->id) )
        {
            return false;
        }

        if ( $adapter->prepareSale($sale) )
        {
            $sale->status = BOL_BillingSaleDao::STATUS_PREPARED;
            $this->saveSale($sale);

            return true;
        }

        return false;
    }

    /**
     * Sets sale status 'verified'
     * 
     * @param OW_BillingAdapter $adapter
     * @param BOL_BillingSale $sale
     * @return boolean
     */
    public function verifySale( OW_BillingAdapter $adapter, BOL_BillingSale $sale )
    {
        if ( !$this->getSaleById($sale->id) )
        {
            return false;
        }

        if ( $adapter->verifySale($sale) )
        {
            $sale->status = BOL_BillingSaleDao::STATUS_VERIFIED;
            $this->saveSale($sale);

            return true;
        }

        return false;
    }

    /**
     * Delivers ordered product
     * 
     * @param OW_BillingProductAdapter $adapter
     * @param BOL_BillingSale $sale
     * @return int
     */
    public function deliverSale( OW_BillingProductAdapter $adapter, BOL_BillingSale $sale )
    {
        if ( !$this->getSaleById($sale->id) )
        {
            return false;
        }

        if ( $adapter->deliverSale($sale) )
        {
            $sale->status = BOL_BillingSaleDao::STATUS_DELIVERED;
            $this->saveSale($sale);
            $event = new OW_Event(self::EVENT_ON_AFTER_DELIVER_SALE, array("saleDbo" => $sale, "adapter" => $adapter));
            OW::getEventManager()->trigger($event);
            return true;
        }

        return false;
    }

    public function registerRebillSale( OW_BillingAdapter $adapter, BOL_BillingSale $parentSale, $rebillTransId )
    {
        $parentSale->id = null;
        $parentSale->transactionUid = $rebillTransId;

        /** @var BOL_BillingGateway $gateway */
        $gateway = $this->billingGatewayDao->findById($parentSale->gatewayId);
        
        $saleId = $this->initSale($parentSale, $gateway->gatewayKey);
        $sale = $this->getSaleById($saleId);
        $this->prepareSale($adapter, $sale);
        $sale = $this->getSaleById($saleId);
        $this->verifySale($adapter, $sale);

        return $saleId;
    }

    /**
     * Updates sale
     * 
     * @param $sale
     * @return int
     */
    public function saveSale( BOL_BillingSale $sale )
    {
        $this->billingSaleDao->save($sale);

        return $sale->id;
    }

    /**
     * Stores sale Id in session
     * 
     * @param int $saleId
     * @return boolean
     */
    public function storeSaleInSession( $saleId )
    {
        $key = 'base.billing.sale';

        $session = OW::getSession();
        $session->set($key, $saleId);

        return true;
    }

    /**
     * Returns sale stored in session
     * 
     * @return BOL_BillingSale
     */
    public function getSessionSale()
    {
        $session = OW::getSession();
        $key = 'base.billing.sale';

        if ( $session->isKeySet($key) )
        {
            $saleId = $session->get($key);

            if ( $saleId )
            {
                return $this->getSaleById($saleId);
            }
        }

        return null;
    }

    /**
     * Deletes sale from session
     * 
     * @return boolean
     */
    public function unsetSessionSale()
    {
        $key = 'base.billing.sale';
        $session = OW::getSession();

        if ( $session->isKeySet($key) )
        {
            $session->delete($key);
        }

        return true;
    }
    
    public function getSessionBackUrl()
    {
        $session = OW::getSession();
        $key = 'base.billing.back_url';
        
        if ( $session->isKeySet($key) )
        {
            return $session->get($key);
        }

        return null;
    }
    
    public function setSessionBackUrl( $url )
    {
        $session = OW::getSession();
        $key = 'base.billing.back_url';
        
        $session->set($key, $url);
    }
    
    public function unsetSessionBackUrl()
    {
        $key = 'base.billing.back_url';
        $session = OW::getSession();

        if ( $session->isKeySet($key) )
        {
            $session->delete($key);
        }

        return true;
    }

    /**
     * Generates sale hash
     * 
     * @return string
     */
    public function getMD5Hash()
    {
        return md5(time()); // TODO: smth not so trivial
    }
    /* Billing product methods */

    /**
     * Get product by producnt key
     * 
     * @param string $productKey
     * @return BOL_BillingProduct
     */
    public function getProductByKey( $productKey )
    {
        if ( !mb_strlen($productKey) )
        {
            return null;
        }

        return $this->billingProductDao->findByKey($productKey);
    }

    /**
     * Adds or updates product
     * 
     * @param BOL_BillingProduct $product
     * @return int
     */
    public function saveProduct( BOL_BillingProduct $product )
    {
        $this->billingProductDao->save($product);

        return $product->id;
    }

    public function deleteProduct( $productKey )
    {
        if ( !mb_strlen($productKey) )
        {
            return false;
        }

        $this->billingProductDao->deleteProduct($productKey);

        return true;
    }

    /**
     * Returns product adapter object
     * 
     * @param string $productKey
     * @return OW_BillingProductAdapter
     */
    public function getProductAdapter( $productKey )
    {
        if ( !mb_strlen($productKey) || !$product = $this->getProductByKey($productKey) )
        {
            return null;
        }

        if ( class_exists($product->adapterClassName) )
        {
            return new $product->adapterClassName;
        }

        return null;
    }

    /**
     * Activates product
     * 
     * @param string $productKey
     * @return boolean
     */
    public function activateProduct( $productKey )
    {
        $product = $this->getProductByKey($productKey);

        if ( $product )
        {
            $product->active = 1;
            $this->billingProductDao->save($product);

            return true;
        }

        return false;
    }

    /**
     * Deactivates product
     * 
     * @param $productKey
     * @return boolean
     */
    public function deactivateProduct( $productKey )
    {
        $product = $this->getProductByKey($productKey);

        if ( $product )
        {
            $product->active = 0;
            $this->billingProductDao->save($product);

            return true;
        }

        return false;
    }
    /* Billing gateway methods */

    /**
     * Adds billing gateway
     * 
     * @param BOL_BillingGateway $gateway
     * @return int
     */
    public function addGateway( BOL_BillingGateway $gateway )
    {
        $this->billingGatewayDao->save($gateway); // TODO: check currency support

        return $gateway->id;
    }

    /**
     * Deletes billing gateway
     * 
     * @param string $gatewayKey
     * @return boolean
     */
    public function deleteGateway( $gatewayKey )
    {
        $this->billingGatewayDao->deleteByKey($gatewayKey);

        return true;
    }

    /**
     * Activates gateway
     * 
     * @param string $gatewayKey
     * @return boolean
     */
    public function activateGateway( $gatewayKey )
    {
        $gateway = $this->findGatewayByKey($gatewayKey);

        if ( $gateway )
        {
            $gateway->active = 1;
            $this->billingGatewayDao->save($gateway);

            return true;
        }

        return false;
    }

    /**
     * Deactivates gateway
     * 
     * @param $gatewayKey
     * @return boolean
     */
    public function deactivateGateway( $gatewayKey )
    {
        $gateway = $this->findGatewayByKey($gatewayKey);

        if ( $gateway )
        {
            $gateway->active = 0;
            $this->billingGatewayDao->save($gateway);

            return true;
        }

        return false;
    }

    /**
     * Finds gateway by gateway key
     * 
     * @param string $gatewayKey
     * @return BOL_BillingGateway
     */
    public function findGatewayByKey( $gatewayKey )
    {
        return $this->billingGatewayDao->findByKey($gatewayKey);
    }

    /**
     * Returns the list of activated gateways
     * 
     * @return array
     */
    public function getActiveGatewaysList( $forMobile = false )
    {
        return $this->billingGatewayDao->getActiveList($forMobile);
    }
    
    /**
     * Returns the list of gateways without dynamic pricing support
     */
    public function getNotDynamicGatewaysList()
    {
        return $this->billingGatewayDao->getNotDynamicList();
    }

    /**
     * Returns gateway configuration value
     * 
     * @param string $gatewayKey
     * @param string $configName
     * @return string
     */
    public function getGatewayConfigValue( $gatewayKey, $configName )
    {
        return $this->billingGatewayConfigDao->getConfigValue($gatewayKey, $configName);
    }

    /**
     * Sets gateway configuration value
     * 
     * @param string $gatewayKey
     * @param string $configName
     * @param string $configValue
     * @return boolean
     */
    public function setGatewayConfigValue( $gatewayKey, $configName, $configValue )
    {
        return $this->billingGatewayConfigDao->setConfigValue($gatewayKey, $configName, $configValue);
    }
    /* Misc methods */

    /**
     * Returns site currently active currency
     * 
     * @return string
     */
    public function getActiveCurrency()
    {
        return OW::getConfig()->getValue(LOCALIZATION_BOL_Service::KEY, 'defaultCurrency');
    }

    /**
     * Checks if provider supports active currency 
     * 
     * @param string $currencies
     * @return boolean
     */
    public function currencyIsSupported( $currencies )
    {
        $currencies = explode(',', $currencies);

        if ( !count($currencies) )
        {
            return false;
        }

        $active = $this->getActiveCurrency();

        return in_array($active, $currencies);
    }

    /**
     * Deletes expired sales
     * 
     * @return boolean
     */
    public function deleteExpiredSales()
    {
        $this->billingSaleDao->expireInitSales();

        $this->billingSaleDao->expirePreparedSales();

        return true;
    }

    /**
     * Returns completed order page url 
     * 
     * @param string $hash
     * @return string
     */
    public function getOrderCompletedPageUrl( $hash = null )
    {
        if ( isset($hash) && $sale = $this->getSaleByHash($hash) )
        {
            return OW::getRouter()->urlForRoute('base_billing_completed', array('hash' => $hash));
        }
        else
        {
            return OW::getRouter()->urlForRoute('base_billing_completed_st');
        }
    }

    /**
     * Returns cancelled order page url
     *
     * @param string $hash
     * @return string
     */
    public function getOrderCancelledPageUrl( $hash = null)
    {
        if ( isset($hash) && $sale = $this->getSaleByHash($hash) )
        {
            return OW::getRouter()->urlForRoute('base_billing_canceled', array('hash' => $hash));
        }
        else
        {
            return OW::getRouter()->urlForRoute('base_billing_canceled_st');
        }
    }
    
    /**
     * Returns failed order page url
     *
     * @return string
     */    
    public function getOrderFailedPageUrl( )
    {
        return OW::getRouter()->urlForRoute('base_billing_error');
    }
    
    public function getFinanceList( $page, $onPage )
    {
        $list = $this->billingSaleDao->getSaleList($page, $onPage);
        
        foreach ( $list as &$sale )
        {
            $sale['totalAmount'] = floatval($sale['totalAmount']);
        }

        return $list;
    }
    
    public function countSales()
    {
        return $this->billingSaleDao->countSales();
    }
    
    public function getSalesCurrencies( )
    {
        return $this->billingSaleDao->getSalesCurrencies();
    }
    
    public function getTotalIncome()
    {
        $currList = $this->getSalesCurrencies();

        $incomeArr = array();
        
        foreach ( $currList as $currency )
        {
            $sum = $this->billingSaleDao->getSalesSumByCurrency($currency['currency']);
            
            if ( $sum != 0 )
            {
                $incomeArr[$currency['currency']] = floatval($sum);
            }
        }
        
        return $incomeArr;
    }
    
    public function addConfig( $gatewayKey, $name, $value )
    {
        $this->billingGatewayConfigDao->addConfig($gatewayKey, $name, $value);
    }
    
    public function deleteConfig( $gatewayKey, $name )
    {
        $this->billingGatewayConfigDao->deleteConfig($gatewayKey, $name);
    }
    
    public function findGatewayProductList( $gatewayId )
    {
        $products = $this->billingGatewayProductDao->findListForGateway($gatewayId);
        
        if ( !$products )
        {
            return null;
        }
        
        $pluginService = BOL_PluginService::getInstance();
        
        $list = array();
        foreach ( $products as $prod )
        {
            $list[$prod->id]['dto'] = $prod;
            $plugin = $pluginService->findPluginByKey($prod->pluginKey);
            if ( $plugin )
            {
                $list[$prod->id]['plugin'] = $plugin->title;
            }
        }        
        
        return $list;
    }
    
    public function addGatewayProduct( $gatewayId, $pluginKey, $entityType, $entityId )
    {
        $product = $this->billingGatewayProductDao->findProduct($gatewayId, $pluginKey, $entityType, $entityId);
        
        if ( $product )
        {
            return $product->id;
        }
        
        $product = new BOL_BillingGatewayProduct();
        $product->gatewayId = $gatewayId;
        $product->pluginKey = $pluginKey;
        $product->entityType = $entityType;
        $product->entityId = $entityId;
        
        $this->billingGatewayProductDao->save($product);
        
        return $product->id;
    }
    
    public function getGatewayProductId( $gatewayId, $pluginKey, $entityType, $entityId )
    {
        $product = $this->billingGatewayProductDao->findProduct($gatewayId, $pluginKey, $entityType, $entityId);
        
        return $product ? $product->productId : null;
    }
    
    public function updateGatewayProduct( $id, $productId )
    {
        if ( !mb_strlen($productId) )
        {
            return false;
        }

        /** @var BOL_BillingGatewayProduct $product */
        $product = $this->billingGatewayProductDao->findById($id);
        
        if ( $product )
        {
            $product->productId = $productId;
            $this->billingGatewayProductDao->save($product);
            
            return true;
        }
        
        return false;
    }
    
    public function deleteGatewayProductsByPluginKey( $pluginKey )
    {
        $this->billingGatewayProductDao->deleteByPluginKey($pluginKey);
    }

    /**
     * Returns currencies list
     * 
     * @return array
     */
    public function getCurrencies() {
        return LOCALIZATION_BOL_Service::getInstance()->getCurrencies();
    }

    
    public function findRecurringBillingSale( $userId, $entityId )
    {
        $userId = intval($userId);
        $entityId = intval($entityId);

        return $this->billingSaleDao->findRecurringBillingSale( $userId, $entityId );

    }

    public function countRecurringBillingSale( $userId, $entityId )
    {
        $userId = intval($userId);
        $entityId = intval($entityId);

        return $this->billingSaleDao->countRecurringBillingSale( $userId, $entityId );

    }

    public function findListByUserIdEntityId( $userId, $entityId )
    {
        $userId = intval($userId);
        $entityId = intval($entityId);
        
        return $this->billingSaleDao->findListByUserIdEntityId( $userId, $entityId );
    }

    /**
     * @param $billingGatewayKey
     * @param $langKey
     * @return null|string
     */
    public function  getBillingGatewayExtraInfo( $billingGatewayKey, $langKey )
    {
        $isInfoExist = BOL_LanguageService::getInstance()->findKey($billingGatewayKey, $langKey);

        if( !$isInfoExist ) { return null; }

        return OW::getLanguage()->text($billingGatewayKey, $langKey);
    }
}