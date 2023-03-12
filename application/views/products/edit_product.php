<?php $this->load->view('includes/header'); ?>



        <?php $this->load->view('includes/sidebar'); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid my-4">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        
                        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">


                        <div class="col-md-8 mx-auto custom_border">

                           <?php echo form_open_multipart(); ?>

                                <div class="row my-4">
                                
                                <div class="col-md-3">
                                <label>Name <span class="text-danger">*</span></label>
                                </div>
                                
                                <div class="col-md-9">
                                <input class="form-control" type="text" name="name" placeholder="Name of the product" value="<?php echo $product['name']; ?>" required/>
                                </div>

                                </div>



                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Category <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-9">

                                <select class="form-control" name="category" required>
                                
                                <option value="">Select a category</option>

                                <?php foreach($categories as $category){ ?>

                                <option <?php if($category->category_id == $product['categoryId'] ) { echo "selected"; } ?> value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>

                                <?php } ?>

                                </select>

                                </div>

                                </div>


                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Price <span class="text-danger">*</span></label>
                                </div>

                                <div class="col-md-9">
                                <input class="form-control" type="number" name="price" placeholder="Enter Price" value="<?php echo $product['price']; ?>" required/>
                                </div>

                                </div>



                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Image <span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-9">
                                <img style="height:100px;" src="<?php echo base_url(); ?>uploads/products/<?php echo $product['image']; ?>"/>
                                </div>

                                </div>



                                <div class="row my-4">

                                <div class="col-md-3">
                                <label>Update Image <span class="text-danger"></span></label>
                                </div>

                                <div class="col-md-9">
                                <input class="form-control" type="file" name="Image[]"/>
                                </div>

                                </div>


                                <div class="row">

                                    <div class="col-md-4 mx-auto text-center">

                                    <a href="<?php echo base_url(); ?>Products" class="btn btn-danger">Go Back</a>

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