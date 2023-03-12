<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Products extends MY_Controller {

	
	public function index()
	{

        $data['page_title'] = "View Products";

        //fetch all products
        $data['products'] = $this->CommonModel->fetch_all_products();

		$this->load->view('products/view_products',$data);

	}





    //Add new product
    public function Add()
    {

    //page title
    $data['page_title'] = "Add Product";

    //pass all categories for dropdown
    $data['categories'] = $this->CommonModel->fetch_all('category');

    if($_POST)
    {

        //validate posted data using ci validation lib
        $this->form_validation->set_rules('name','Name','required');
        $this->form_validation->set_rules('category','Category','required');
        $this->form_validation->set_rules('price','Price','required');

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

        redirect(base_url().'Products/Add');
        
        exit;

        }
        else
        {
        //validation success

        $insert_data = array(
            
            'categoryId' => $this->input->post('category'),

            'name' => $this->input->post('name'),

            'price' => $this->input->post('price'),

        );

        $id = $this->CommonModel->insert('products',$insert_data);

        
        //Image upload

        if(!empty($_FILES["Image"]["name"]))
							{
								
								for ($i = 0; $i < count($_FILES['Image']['name']); $i++) 
								  {
										if($_FILES["Image"]["name"][$i]!='')
										{	
													
					$filename2 	= 	basename($_FILES["Image"]["name"][$i]);
					$ext2 		= 	@end(explode('.', $filename2));
					$ext2 		= 	strtolower($ext2);			
					$gallery2    = 	"product_".rand().'.'.$ext2;			
					$uploadfile2 = 	"uploads/products";
					
				move_uploaded_file($_FILES["Image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
					
				$data_imgg  	= array('image'  =>$gallery2);

				$condd  	= 	array('product_id'  =>$id);

				$add_imgg	=	$this->CommonModel->update('products',$condd,$data_imgg);
				
				}}}



        $flashdata = array(
            //type of msg error or success
            'type' => 'success',

            //msg to display
            'msg' => 'Product added',

        );

        //set flashdata for notification

        $this->session->set_flashdata('noti',$flashdata);

        redirect(base_url().'Products/Add');

        }

    }
    

    $this->load->view('products/add_product',$data);


    }

    //#############






    //edit product

    public function Edit($id)
    {

    //page title
    $data['page_title'] = "Edit Product";

    //pass all categories for dropdown
    $data['categories'] = $this->CommonModel->fetch_all('category');

    //product_details
    $data['product'] = $this->CommonModel->fetch_single('products','product_id',$id);

    //update cond
    $cond = array('product_id' => $id);

    if($_POST)
    {

    //validate posted data using ci validation lib
    $this->form_validation->set_rules('name','Name','required');
    $this->form_validation->set_rules('category','Category','required');
    $this->form_validation->set_rules('price','Price','required');


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

        redirect(base_url().'Products/Edit/'.$id);
        
        exit;

        }
        else
        {
        //validation success

        $update_data = array(
            
            'categoryId' => $this->input->post('category'),

            'name' => $this->input->post('name'),

            'price' => $this->input->post('price'),

        );

        $this->CommonModel->update('products',$cond,$update_data);



         //Image upload

         if(!empty($_FILES["Image"]["name"]))

         {
             
             for ($i = 0; $i < count($_FILES['Image']['name']); $i++) 
               {
                     if($_FILES["Image"]["name"][$i]!='')
                     {	

                @unlink('uploads/products/'.$data['product']['image']);
                                            
            $filename2 	= 	basename($_FILES["Image"]["name"][$i]);
            $ext2 		= 	@end(explode('.', $filename2));
            $ext2 		= 	strtolower($ext2);			
            $gallery2    = 	"product_".rand().'.'.$ext2;			
            $uploadfile2 = 	"uploads/products";
            
            move_uploaded_file($_FILES["Image"]["tmp_name"][$i],  $uploadfile2."/".$gallery2);
            
            $data_imgg  	= array('image'  =>$gallery2);

            $condd  	= 	array('product_id'  =>$id);

            $add_imgg	=	$this->CommonModel->update('products',$condd,$data_imgg);

            }}}





        $flashdata = array(
            //type of msg error or success
            'type' => 'success',

            //msg to display
            'msg' => 'Product updated',

        );

        //set flashdata for notification

        $this->session->set_flashdata('noti',$flashdata);

        redirect(base_url().'Products/Edit/'.$id);

        }

    }


    $this->load->view('products/edit_product',$data);


    }

    //###########




    //Delete

    public function Delete($id)
    {

    //fetch product for image deletion
    $product = $this->CommonModel->fetch_single('products','product_id',$id);

    //add deleted flag

    $delete_data = array('is_deleted' => 1);

    $delete_cond = array('product_id' => $id);

    $this->CommonModel->update('products',$delete_cond,$delete_data);

    $flashdata = array(
        //type of msg error or success
        'type' => 'success',

        //msg to display
        'msg' => 'Product deleted',
    );

    //set flashdata for notification

    $this->session->set_flashdata('noti',$flashdata);

    redirect(base_url().'Products');


    }








}
