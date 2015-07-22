<?php
/**
 * Class to fire up WooCommerce Cart to LimeLight
 *
 * @author Daniel
 */

class WooLimeLight {

    /**
    * Your LimeLight Domain eg. www.yourlldomain.com
    * @var String
    */
    private $ll_username = 'www.yourlldomain.com';

    /**
    * Your LimeLight password
    * @var String
    */
    private $ll_password = 'xxx';

    /**
    * Campaign ID
    * @var Integer
    */
    private $ll_CID = 0;

    /**
    * Affiliate ID
    * @var Integer
    */
    private $ll_AFID = 0;

    /**
    * Shipping ID
    * @var Integer
    */
    private $ll_shippingID = 0;


    /**
    *
    * @var String
    */
    private $ll_api_type = 'transact';

    /**
    *
    * @var String
    */
    private $ll_method = 'NewOrder';

    /**
    *
    * @var String
    */
    private $ll_tranType = 'sale';


    public function __construct() {

    }

    public function init() {
        if (isset($_POST['ll_order']) && $_POST['ll_order'] == 'send') {
            $result = $this->processOrder($_POST);
            if ($result['errorFound'] == 0) {
                // no error - redirect to thank you page
            }
            else {
                // error - stay here and inform user
            }
        }
        else {
            echo $this->getOrderForm();
        }
    }



    /**
    * Normalized cart items for LimeLight
    * @return array
    */
    public function getNormalizedCartItems() {
        $i = 0;
        $upsellProductIds = array();
        foreach (WC()->cart->get_cart() as $item) {
            $productId = get_post_meta($item['product_id']);
            $productId =$productId['productId'][0] ;
            if ($i == 0) {
                $product_fields['productId'] = $productId;
                $product_fields['product_qty_' . $productId] .= $item['quantity'];
            }
            else {
                $product_fields['upsellCount'] = 1;
                array_push($upsellProductIds, $productId);
                $product_fields['product_qty_' . $productId] .= $item['quantity'];
            }
            $i++;
        }
        $uids = '';
        foreach ($upsellProductIds as $uid) {
            $uids .= $uid . ',';
        }
        $product_fields['upsellProductIds'] = substr($uids, 0, -1);
        return $product_fields;
    }



    /**
    * Create order form
    * @return string
    */
    private function getOrderForm() {
        $html = '<form action="' . $_SERVER['REQUEST_URI'] . '" method="post">';
        $html .= file_get_contents(get_template_directory() . '/WooLimeLight/form.php');
        $html .= '</form>';
        return $html;
    }



    /**
    * Create LimeLight URL
    * @return string
    */
    public function getLimeLightUrl() {
        return 'https://' . $this->ll_username . '/admin/' . $this->ll_api_type . '.php';
    }



    /**
    * Merge the init array with the form fields array
    * @param array $fields
    * @return array
    */
    public function processOrder($fields) {
        $ll_fields = array(
            'username'              => $this->ll_username,
            'password'              => $this->ll_password,
            'method'                => $this->ll_method,
            'ipAddress'             => $_SERVER['REMOTE_ADDR'],
            'tranType'              => $this->ll_tranType,
            'shippingId'            => $this->ll_shippingID,
            'campaignId'            => $this->ll_CID,
            'AFID'                  => $this->ll_AFID,
        );
        $fields = array_merge($ll_fields, $fields);
        $cart_items = $this->getNormalizedCartItems();
        $fields = array_merge($cart_items, $fields);

        return $this->fireUpToLimeLight($fields);
    }



    /**
    * Returns the LimeLight result
    * @param array $fields
    * @return array
    */
    private function fireUpToLimeLight($fields) {
        $fields_string = '';
        foreach($fields as $key=>$value){
            $fields_string .= $key.'='.urlencode($value).'&';
        }

        rtrim($fields_string,'&');
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch,CURLOPT_URL,$this->getLimeLightUrl());
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);

        $result = array();
        parse_str(curl_exec($ch), $result);

        curl_close($ch);
        return $result;
    }
}
