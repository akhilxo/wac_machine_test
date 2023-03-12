<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Orders extends MY_Controller {

	
	public function index()
	{

        $data['page_title'] = "View Orders";

        //fetch all products
        $data['orders'] = $this->CommonModel->fetch_all_orders();

		$this->load->view('orders/view_orders',$data);

	}





    //Add new product
    public function Add()
    {

    //page title
    $data['page_title'] = "Add Order";

    //pass all products for dropdown
    $data['products'] = $this->CommonModel->fetch_all_products();

    if($_POST)
    {

        //validate posted data using ci validation lib
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('product','Price','required');
        $this->form_validation->set_rules('qty','Quantity','required');


        if($this->form_validation->run()==FALSE)
        {
        //validation failure,return to page

        $flashdata = array(
            //type of msg error or success
            'type' => 'error',

            //msg to display
            'msg' => 'Please fill required fields',

        );

        //set flashdata for notification

        $this->session->set_flashdata('noti',$flashdata);

        redirect(base_url().'Orders/Add');
        
        exit;

        }
        else
        {
        //validation success

        $product_id = $this->input->post('product');

        $quantity = $this->input->post('qty');
     
        $product = $this->CommonModel->fetch_single('products','product_id',$product_id);
     
        $net_amount = $product['price'] * $quantity;

        $insert_data = array(
            
            'order_uid' => uniqid(),

            'productId' => $product_id,

            'customer_name' => $this->input->post('name'),

            'phone_number' => $this->input->post('phone'),
            
            'quantity' => $quantity,

            'net_amount' => $net_amount,

            'date' => date('Y-m-d H:i:s'),
        );

        $id = $this->CommonModel->insert('orders',$insert_data);

        $flashdata = array(
            //type of msg error or success
            'type' => 'success',

            //msg to display
            'msg' => 'Order added',

        );

        //set flashdata for notification

        $this->session->set_flashdata('noti',$flashdata);

        redirect(base_url().'Orders/Add');

        }

    }
    

    $this->load->view('orders/add_order',$data);


    }

    //#############






    //edit product

    public function Edit($id)
    {

    //page title
    $data['page_title'] = "Edit Order";

    //pass all categories for dropdown
     $data['products'] = $this->CommonModel->fetch_all_products();

    //order details
    $data['order'] = $this->CommonModel->fetch_single('orders','order_id',$id);

    //update cond
    $cond = array('order_id' => $id);

    if($_POST)
    {

   //validate posted data using ci validation lib
   $this->form_validation->set_rules('name','Name','required');
   $this->form_validation->set_rules('phone','Phone','required');
   $this->form_validation->set_rules('product','Price','required');
   $this->form_validation->set_rules('qty','Quantity','required');


   if($this->form_validation->run()==FALSE)
   {
   //validation failure,return to page

   $flashdata = array(
       //type of msg error or success
       'type' => 'error',

       //msg to display
       'msg' => 'Please fill required fields',

   );

   //set flashdata for notification

   $this->session->set_flashdata('noti',$flashdata);

   redirect(base_url().'Orders/Edit/'.$id);
   
   exit;

   }
   else
   {
   //validation success

   $product_id = $this->input->post('product');

   $quantity = $this->input->post('qty');

   $product = $this->CommonModel->fetch_single('products','product_id',$product_id);

   $net_amount = $product['price'] * $quantity;

   $update_data = array(

       'productId' => $product_id,

       'customer_name' => $this->input->post('name'),

       'phone_number' => $this->input->post('phone'),

       'quantity' => $quantity,

       'net_amount' => $net_amount,
       
   );

        $this->CommonModel->update('orders',$cond,$update_data);

        $flashdata = array(
            //type of msg error or success
            'type' => 'success',

            //msg to display
            'msg' => 'Order updated',

        );

        //set flashdata for notification

        $this->session->set_flashdata('noti',$flashdata);

        redirect(base_url().'Orders/Edit/'.$id);

        }

    }


    $this->load->view('orders/edit_order',$data);


    }

    //###########






    //Delete

    public function Delete($id)
    {

    $this->db->where('order_id',$id);

    $this->db->delete('orders');


    $flashdata = array(
        //type of msg error or success
        'type' => 'success',

        //msg to display
        'msg' => 'Order deleted',

    );

    //set flashdata for notification

    $this->session->set_flashdata('noti',$flashdata);

    redirect(base_url().'Orders');

    }

    //






    //Generate Invoice (TCPDF Library)


    public function Invoice($id)
    {


    $order = $this->CommonModel->fetch_single_order($id);

    $this->load->library('MYPDF');

		$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Company');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');
		$pdf->SetKeywords('');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));


		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set font
		$pdf->SetFont('times', 'BI', 12);

		// add a page
		$pdf->AddPage();

		// set some text to print
		$txt = <<<EOD
		<table cellspacing="0" cellpadding="5" border="1">

        <tr>
        <th>Date</th>
        <td>{$order['date']}</td>
        </tr>
  
        <tr>
        <th>Order ID</th>
        <th>{$order['order_uid']}</th>
        </tr>

        <tr>
        <th>Products</th>
        <td>{$order['name']} * {$order['quantity'] } = {$order['net_amount']}</td>
        </tr>

        
        <tr>
        <th>Total</th>
        <td>{$order['net_amount']}</td>
        </tr>


</table>
EOD;

		// print a block of text using Write()
		$pdf->writeHTML($txt, true, false, false, false, '');

		// ---------------------------------------------------------
		 ob_clean();
		//Close and output PDF document
		$pdf->Output('example_003.pdf', 'I');


    }




}
