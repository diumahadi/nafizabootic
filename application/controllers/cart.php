<?php
/**
 * Created by PhpStorm.
 * User: mahadi
 * Date: 07-Jun-19
 * Time: 9:45 PM
 */

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('common_model');
        $this->load->model('item_model');
        $this->load->model('customer_model');
        $this->load->model('customer_model');
        $this->load->model('order_model');
        $this->load->model('order_item_model');
    }

    public function index()
    {
        if($this->cart->total_items()<=0) {
            redirect("/");
        }
        $data['itemList'] = $this->cart->contents();
        $this->load->view('site/header');
        $this->load->view('site/shopping_cart', $data);
        $this->load->view('site/footer', $data);
    }

    public function proceedToCheckOut()
    {
        if($this->cart->total_items()<=0) {
            redirect("/");
        }
        $data = array();
        $data['itemList'] = $this->cart->contents();
        $data['totalItems'] = $this->cart->total_items();
        $data['subTotalAmount'] = $this->cart->format_number($this->cart->total());
        $data['totalAmount'] = $this->cart->format_number($this->cart->total()+50);
        $this->load->view('site/header');
        $this->load->view('site/checkout', $data);
        $this->load->view('site/footer', $data);
    }

    public function addItemToCart()
    {
        $productId = $this->input->post('productId');
        $quantity = $this->input->post('quantity');

        $productInfo = $this->item_model->findOne($productId);

        $data = array(
            'id'    => $productId,
            'qty'    => $quantity,
            'price'    => $productInfo->discount_price,
            'name'    => $productInfo->item_name,
            'image' => $productInfo->profile_image
        );

        $this->cart->insert($data);

        $data = array();
        $data['totalItems'] = $this->cart->total_items();
        $data['totalAmount'] = $this->cart->format_number($this->cart->total());
        echo json_encode($data);
    }

    public function updateItemQty()
    {
        $rowid = $this->input->post('rowid');
        $quantity = $this->input->post('quantity');

        // Update item in the cart
        if(!empty($rowid) && !empty($quantity)){
            $data = array(
                'rowid' => $rowid,
                'qty'   => $quantity
            );
            $this->cart->update($data);
        }

        $data = array();
        $data['totalItems'] = $this->cart->total_items();
        $data['totalAmount'] = $this->cart->format_number($this->cart->total());
        echo json_encode($data);
    }

    function removeItem(){
        $rowid = $this->input->post('rowid');
        $data = array(
            'rowid' => $rowid,
            'qty'   => 0
        );
        $this->cart->update($data);
        $data = array();
        $data['totalItems'] = $this->cart->total_items();
        $data['totalAmount'] = $this->cart->format_number($this->cart->total());
        echo json_encode($data);
    }

    public function destroyCart() {
        $this->cart->destroy();
    }

    public function getCartData()
    {
        $data = array();
        $data['totalItems'] = $this->cart->total_items();
        $data['totalAmount'] = $this->cart->format_number($this->cart->total());
        echo json_encode($data);
    }

    public function getTotalItemInCart(){
        $data = array();
        $data['totalItems'] = $this->cart->total_items();
        echo json_encode($data);
    }


    public function confirmOrder() {

        $customer = array(
            'full_name' => $this->input->post('full_name'),
            'mobile' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'region' => $this->input->post('region'),
            'address' => $this->input->post('address'),
            'customerType' => 'OC',
            'enabled' => 'Y',
            'created_at' => $this->common_model->getCurrentTimestamp(),
        );

        $customerId = $this->customer_model->insert($customer);


        $payment = array(
            'order_no' => $this->order_model->getNewOrderNo(),
            'customer_id' => $customerId,
            'order_date' => date('Y-m-d'),
            'deliver_date' => date('Y-m-d'),
            'payment_tp' => $this->input->post('paymentType'),
            'paid_amount' => str_replace(",","",$this->input->post('totalAmount')),
            'total_amount' => str_replace(",","",$this->input->post('totalAmount')),
            'discount' => 0.0,
            'shipping_rate' => $this->input->post('shipping_rate'),
            'transaction_id' => $this->input->post('transaction_id'),
            'reference_no' => $this->input->post('reference_no'),
            'terms_cons' => $this->input->post('termsCons'),
            'order_status' => 'P',
            'created_at' => $this->common_model->getCurrentTimestamp(),
        );

        $orderId = $this->order_model->insert($payment);

        foreach ($this->cart->contents() as $item) {
            $productInfo = $this->item_model->findOne($item['id']);
            $itemDetails = array(
                'order_id'=> $orderId,
                'item_id'=> $item['id'],
                'quantity'=> $item['qty'],
                'purchase_price'=> $productInfo->purchase_price,
                'sales_price'=> $item['price'],
                'size'=> 'One Size',
            );
            $orderId = $this->order_item_model->insert($itemDetails);
        }
        //Destroying cart items
        $this->cart->destroy();

        $data = array();
        $data['msg'] = 'success';
        echo json_encode($data);

    }
}