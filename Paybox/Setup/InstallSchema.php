<?php

namespace Heritage\Paybox\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();   

        $setup->getConnection()->addColumn(
        $setup->getTable('quote_payment'),
            'paymentname',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentname',
            ]
        );

	    $setup->getConnection()->addColumn(
	    $setup->getTable('quote_payment'),
            'paymentzip',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentzip',
            ]
        );

        $setup->getConnection()->addColumn(
        $setup->getTable('quote_payment'),
            'paymentcard',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentcard',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('quote_payment'),
            'paymentcvv',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentcvv',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('quote_payment'),
            'paymentexp',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentexp',
            ]
        );

        //Sales Order Payment

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'paymentname',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentname',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'paymentzip',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentzip',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'paymentcard',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentcard',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'paymentcvv',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentcvv',
            ]
        );

        $setup->getConnection()->addColumn(
            $setup->getTable('sales_order_payment'),
            'paymentexp',
            [
                'type' => 'text',
                'nullable' => true  ,
                'comment' => 'paymentexp',
            ]
        );

        $setup->endSetup();
  }
}
