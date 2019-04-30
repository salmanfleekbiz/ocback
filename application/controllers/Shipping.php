<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH . 'libraries/easypost/easypost.php');

class Shipping extends MY_Controller{
    
    function __construct(){
        parent::__construct();
        
        \EasyPost\EasyPost::setApiKey('EZTK8bf67df1bd99447587eaaf1d8164b551aJU8N6IDrO6XXNO9HwaChg');
        $this->load->model('Model_ship', 's_model');
        $this->load->library('user_agent');
        $this->load->library('cart');
    }
    
    function index(){
		if (isset($_SESSION['order_id']) && $_SESSION['order_id'] > 0) {
            $order_id                   = $_SESSION['order_id'];
            $cdetails                   = $_SESSION['contact_details'];
            $edata['order']             = $this->Dmodel->get_tbl_whr('orders', $order_id);
            $viewdata['transaction_id'] = $edata['order'][0]['order_code'];
            $viewdata['basket_total']   = $edata['order'][0]['amount'];
            $edata['odetails']          = $this->Dmodel->get_tbl_whr_arr('order_details', array(
                'order_id' => $order_id
            ));
            
            if ($edata['order'][0]['trade_details'] == "Prepaid Label" || $edata['order'][0]['trade_details'] == "Shipping Kit with Prepaid Label") {
                $weight        = $_SESSION['tqty'] * 8;
                $pkg           = ($weight <= 13 ? null : 'flat');
                $status_msg    = 0;
                $address_error = 0;
                $address       = explode(',', Address);
                try {
                    $to_address = \EasyPost\Address::create(array(
                        "verify" => array(
                            "delivery"
                        ),
                        "name" => Site_Title,
                        "street1" => $address[0],
                        "city" => $address[1],
                        "state" => $address[2],
                        "zip" => $address[3],
                        "phone" => Phone
                    ));
                }
                catch (Exception $e) {
                    $address_error = 1;
                }
                
                try {
                    $from_address = \EasyPost\Address::create(array(
                        "verify" => array(
                            "delivery"
                        ),
                        "street1" => $cdetails['unit'] . " " . $cdetails['street'],
                        "street2" => "",
                        "city" => $cdetails['city'],
                        "state" => $cdetails['state'],
                        "zip" => $cdetails['zip_code'],
                        "country" => "US",
                        "company" => $cdetails['first_name'] . ' ' . $cdetails['last_name'],
                        "phone" => $cdetails['phone']
                    ));
                }
                catch (Exception $e) {
                    $address_error = 1;
                }
                
                
                if ($address_error == 0) {
                    $parcel   = \EasyPost\Parcel::create(array(
                        "predefined_package" => $pkg,
                        "weight" => $weight
                    ));
                    $shipment = \EasyPost\Shipment::create(array(
                        "to_address" => $to_address,
                        "from_address" => $from_address,
                        "parcel" => $parcel,
                        "options" => array(
                            'print_custom_1' => "ORDER #" . $order_id
                        )
                    ));
					$shipment->buy($shipment->lowest_rate());
                    $shipment->insure(array(
                        'amount' => 100
                    ));
					
					$label_url = $shipment->postage_label->label_url;
					$tracking_url = $shipment->tracker->public_url;
					
                    if ($edata['order'][0]['trade_details'] == "Shipping Kit with Prepaid Label") {
                        $parcel_kit   = \EasyPost\Parcel::create(array(
                            "predefined_package" => null,
                            "weight" => 4
                        ));
                        $shipment_kit = \EasyPost\Shipment::create(array(
                            "to_address" => $from_address,
                            "from_address" => $to_address,
                            "parcel" => $parcel_kit,
                            "options" => array(
                                'print_custom_1' => "ORDER #" . $order_id
                            )
                        ));
						
                        $shipment_kit->buy($shipment_kit->lowest_rate());
						$shipment_kit->insure(array(
							'amount' => 100
						));
						
                        $label_url_kit   = $shipment_kit->postage_label->label_url;
                        $tracking_url_kit = $shipment_kit->tracker->public_url;
						$viewdata['shipment_label'] = "";
						$edata['firstp']='Your Order# '.$edata['order'][0]['order_code'].' has been received. Your shipping kit is on its way and should arrive within a few days. Given below are the details of your order: <br/>'; 
                    }
					else{
						$label_url_kit = '';
						$tracking_url_kit = '';
						$viewdata['shipment_label'] = $label_url;
						$edata['firstp']='Your Order# '.$edata['order'][0]['order_code'].' has been received. Please <a href="'.$label_url.'" target="_blank">Click here</a> to view your shipping label. Given below are the details of your order: <br/>'; 
					}
                    $ship_data = array(
                        'label_url' => $label_url,
                        'tracking_url' => $tracking_url,
                        'kit_label_url' => $label_url_kit,
                        'kit_tracking_url' => $tracking_url_kit
                    );
                    $this->Dmodel->update_data('orders', $order_id, $ship_data, 'id');
                    
                    
                    
                } else {
                    $edata['firstp'] = 'Your Order# ' . $edata['order'][0]['order_code'] . ' has been received. Given below are the details of your order: <br/>';
                }
                $viewdata['address_error'] = $address_error;
                
                
                $ebody = $this->load->view('order_email', $edata, TRUE);
                
                $maildata = array(
                    'from_name' => Site_Title,
                    'from_email' => Site_Email,
                    'to_name' => $cdetails['first_name'] . ' ' . $cdetails['last_name'],
                    'to_email' => $_SESSION['pay_details']['email'],
                    'subject' => 'Your Request has been Received',
                    'message' => $ebody
                );
            } else {
                $edata['firstp'] = 'Your Order# ' . $edata['order'][0]['order_code'] . ' has been received. Given below are the details of your order: <br/>';
                $ebody = $this->load->view('order_email', $edata, TRUE);
                
                $maildata = array(
                    'from_name' => Site_Title,
                    'from_email' => Site_Email,
                    'to_name' => $cdetails['first_name'] . ' ' . $cdetails['last_name'],
                    'to_email' => $_SESSION['pay_details']['email'],
                    'subject' => 'Your Request has been Received',
                    'message' => $ebody
                );
            }
            $this->Dmodel->send_mail($maildata);
            $this->LoadView('shipping', $viewdata);
        } else {
            redirect(base_url());
        }
    }
    
    function address_verify(){
        $address_params = array(
            "verify" => array(
                "delivery"
            ),
            "street1" => $_POST['unit'] . " " . $_POST['street'],
            "street2" => "",
            "city" => $_POST['city'],
            "state" => $_POST['state'],
            "zip" => $_POST['zip_code'],
            "country" => "US",
            "company" => $_POST['first_name'] . ' ' . $_POST['last_name'],
            "phone" => $_POST['phone']
        );
        $address        = \EasyPost\Address::create($address_params);
        echo $address->verifications->delivery;
    }
}