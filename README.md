# Magento2 Shipping Tweaks
Extension hides any other shipping methods if free shipping is available.

### No method of free shipping
<img alt="Magento2 Shipping Tweaks" src="https://karliuka.github.io/m2/shipping-tweaks/no-free-shipping.png" style="width:100%"/>
### There is a method of free shipping
<img alt="Magento2 Shipping Tweaks" src="https://karliuka.github.io/m2/shipping-tweaks/free-shipping.png" style="width:100%"/>
## Install with Composer as you go

1. Go to Magento2 root folder

2. Enter following commands to install module:

    ```bash
    composer require faonni/module-shipping-tweaks
    ```
   Wait while dependencies are updated.

3. Enter following commands to enable module:

    ```bash
	php bin/magento setup:upgrade
	php bin/magento setup:static-content:deploy

