# Magento2 Shipping Tweaks

[![Total Downloads](https://poser.pugx.org/faonni/module-shipping-tweaks/downloads)](https://packagist.org/packages/faonni/module-shipping-tweaks)
[![Latest Stable Version](https://poser.pugx.org/faonni/module-shipping-tweaks/v/stable)](https://packagist.org/packages/faonni/module-shipping-tweaks)	

Extension hides any other shipping methods if free shipping is available.

### No method of free shipping

<img alt="Magento2 Shipping Tweaks" src="https://karliuka.github.io/m2/shipping-tweaks/no-free-shipping.png" style="width:100%"/>

### There is a method of free shipping

<img alt="Magento2 Shipping Tweaks" src="https://karliuka.github.io/m2/shipping-tweaks/free-shipping.png" style="width:100%"/>

## Compatibility

Magento CE(EE) 2.0.x, 2.1.x, 2.2.x, 2.3.x

## Install

#### Install via Composer (recommend)

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-shipping-tweaks
    ```
   Wait while dependencies are updated.
   
#### Manual Installation
   
1. Create a folder {Magento root}/app/code/Faonni/ShippingTweaks

2. Download the corresponding [latest version](https://github.com/karliuka/m2.ShippingTweaks/releases)

3. Copy the unzip content to the folder ({Magento root}/app/code/Faonni/ShippingTweaks)

### Completion of installation

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)

### Configuration

In the Magento Admin Panel go to *Stores > Configuration > Sales > Shipping Settings > Behavior of Methods*.

<img alt="Magento2 Shipping Tweaks" src="https://karliuka.github.io/m2/shipping-tweaks/config.png" style="width:100%"/>

## Uninstall
This works only with modules defined as Composer packages.

#### Remove database data

1. Go to Magento2 root folder

2. Enter following commands to remove database data:

    ```bash
    php bin/magento module:uninstall -r Faonni_ShippingTweaks
  
#### Remove Extension
    
1. Go to Magento2 root folder

2. Enter following commands to remove:

    ```bash
    composer remove faonni/module-shipping-tweaks
    ```

### Completion of uninstall

1. Go to Magento2 root folder

2. Enter following commands:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:di:compile
	php bin/magento setup:static-content:deploy  (optional)
