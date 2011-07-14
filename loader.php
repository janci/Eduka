<?php
/***************************** Storages ************************ js ***/
require_once('Storage/IStorage.php');
require_once('Storage/DatabaseStorage.php');
require_once('Storage/DocumentStorage.php');
require_once('Storage/DummyStorage.php');
require_once('Storage/SessionStorage.php');

/*************************** CashBox Classes ******************* js ***/
require_once('CashBox/Currency.php');
require_once('CashBox/Price.php');

/************************** Shipment Classes ******************* js ***/
require_once('Shipment/Payment.php');
require_once('Shipment/Transport.php');

/***************************** Core Classes ******************** js ***/
require_once('Shop/Price.php');
require_once('Shop/Products.php');
require_once('Shop/Entry.php');
require_once('Shop/Basket.php');

/***********************Application Classes ******************** js ***/
require_once('DI/IContainer');

/***************************** Init Class ********************** js ***/
require_once('Eduka.php');

