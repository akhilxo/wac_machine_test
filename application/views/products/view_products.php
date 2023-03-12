<?php $this->load->view('includes/header'); ?>



        <?php $this->load->view('includes/sidebar'); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid my-4">



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">View Products</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>

                                        <?php 
                                        $i=1;
                                        foreach($products as $product) { ?>

                                        <tr>
                                            
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $product->name ?></td>
                                            <td><?php echo $product->name; ?></td>
                                            <td><?php echo $product->price; ?></td>
                                            <td><img class="preview_image" src="<?php echo base_url(); ?>uploads/products/<?php echo $product->image;?>"></td>
                                            <td>

                                            <a title="Edit Product" class="btn btn-primary" href="<?php echo base_url(); ?>Products/Edit/<?php echo $product->product_id; ?>"><i class="fas fa-edit"></i></a>

                                            <a title="Delete Product" class="btn btn-danger" onclick="return confirm('Delete this product?');" href="<?php echo base_url(); ?>Products/Delete/<?php echo $product->product_id; ?>"><i class="fas fa-trash-alt"></i></a>

                                            </td>
                                            
                                        </tr>


                                        <?php } ?>


                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

             



                   


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           

            <?php $this->load->view('includes/footer'); ?>