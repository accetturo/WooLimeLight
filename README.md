# WooCommerce LimeLight CRM
This wordpress plugin integrates the <a href="https://limelightcrm.com/" target="_blank">LimeLight CRM</a> into the WooCommerce plugin. It takes the cart and normalized the items for LimeLight and send it to your LimeLight campaign.

## Getting started
Go into your theme folder and clone this repository

``` sh
$ git clone https://github.com/dnlnwk/WooLimeLight.git
```

Go into this project, open WooLimeLight.php and set the following values with your LimeLight informations

Your LimeLight Domain
``` php
private $ll_username = 'www.yourlldomain.com';
```

 Your LimeLight password
``` php
private $ll_password = 'xxx';
```

Campaign ID
``` php
private $ll_CID = 0;
```

Shipping ID
``` php
private $ll_shippingID = 0;
```

Affiliate ID (optional)
``` php
private $ll_AFID = 0;
```

Insert the shortcode into your order site
``` html
[woocommerce_limelight]
```

Last step is to set a product ID. Go to your WooCommerce products in your wordpress backend and create for every product a new custom field they called "productId" and set the LimeLight product ID as the value.
