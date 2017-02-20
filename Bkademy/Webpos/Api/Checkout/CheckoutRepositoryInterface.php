<?php

namespace Bkademy\Webpos\Api\Checkout;

/**
 * Interface CheckoutRepositoryInterface
 * @package Bkademy\Webpos\Api\Checkout
 */
interface CheckoutRepositoryInterface
{
    /**
     * @param string|null $quoteId
     * @param \Bkademy\Webpos\Api\Data\Checkout\ItemBuyRequestInterface[] $items
     * @param string $customerId
     * @param string[] $section
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function saveCart($quoteId, $items, $customerId, $section);

    /**
     * @param string $quoteId
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function removeCart($quoteId);

    /**
     * @param string $quoteId
     * @param string $itemId
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function removeItem($quoteId, $itemId);

    /**
     * @param string $quoteId
     * @param string $shippingMethod
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function saveShippingMethod($quoteId, $shippingMethod);

    /**
     * @param string $quoteId
     * @param string $paymentMethod
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function savePaymentMethod($quoteId, $paymentMethod);

    /**
     * @param string $quoteId
     * @param string $quoteData
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function saveQuoteData($quoteId, $quoteData);

    /**
     * @param string $quoteId
     * @param string $customerId
     * @return \Bkademy\Webpos\Api\Data\Checkout\ResponseInterface
     */
    public function selectCustomer($quoteId, $customerId);

    /**
     * @param string $quoteId
     * @return \Magento\Sales\Api\Data\OrderInterface
     */
    public function placeOrder($quoteId);

}
