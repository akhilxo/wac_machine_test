<?php $this->load->view('includes/header'); ?>



        <?php $this->load->view('includes/sidebar'); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid my-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        
                        <h1 class="h3 mb-0 text-gray-800">Edit Order</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col-md-8 mx-auto custom_border">

                           <?php echo form_open(); ?>

                                <div class="row my-4">
                                
                                <div class="col-md-3">
                                <label>Customer Name <span class="text-danger">*</span></label>
                                </div>
                                
                                <div class="col-md-9">
                                <input class="form-control" type="text" name="name" placeholder="Name of customer" value="<?php echo $order['customer_name']; ?>" required/>
                                </div>

                                </div>


                                <div class="row my-4">
                                
                                <div class="col-md-3">
                                <label>Phone Number <span class="text-danger">*</span></label>
                                </div>
                                
                                <div class="col-md-9">
                                <input class="form-control" type="text" name="phone" placeholder="Enter phone number" value="<?php echo $order['phone_number']; ?>" required/>
                                </div>

                                </div>



                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Product <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-9">

                                <select class="form-control" name="product" required>
                                
                                <option value="">Select a product</option>

                                <?php foreach($products as $product){ ?>

                                <option value="<?php echo $product->product_id; ?>" <?php if($order['productId'] == $product->product_id ) { echo "selected"; } ?>><?php echo $product->name; ?></option>

                                <?php } ?>

                                </select>

                                </div>

                                </div>


                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Quantity <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-9">
                                <input class="form-control" type="number" name="qty" placeholder="Enter Quantity" value="<?php echo $order['quantity']; ?>" required/>
                                </div>

                                </div>



                                <div class="row">

                                    <div class="col-md-4 mx-auto text-center">

                                    <a href="<?php echo base_url(); ?>Orders" class="btn btn-danger">Go Back</a>

                                    <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>

                                </div>


                            </form>


                        </div>

                       
                    </div>
                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

        
           

            <?php $this->load->view('includes/footer'); ?>