<?php

$installer = $this;
$tableTakeplace = $installer->getTable('shippingtakeplace/table_takeplace');


$installer->startSetup();

$installer->getConnection()->dropTable($tableTakeplace);
$table = $installer->getConnection()
    ->newTable($tableTakeplace)
    ->addColumn('takeplace_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true,
        ))
    ->addColumn('takeplace', Varien_Db_Ddl_Table::TYPE_TEXT, '255', array(
        'nullable'  => false,
    ));
$installer->getConnection()->createTable($table);

$installer->endSetup();