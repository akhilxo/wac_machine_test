<?php $this->load->view('includes/header'); ?>



        <?php $this->load->view('includes/sidebar'); ?>


                <!-- Begin Page Content -->
                <div class="container-fluid my-4">




                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800 text-center">View Orders</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Orders</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Order ID</th>
                                            <th>Customer</th>
                                            <th>Phone</th>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>

                                        <?php 
                                        $i=1;
                                        foreach($orders as $order) { ?>

                                        <tr>
                                            
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $order->order_uid; ?></td>
                                            <td><?php echo $order->customer_name; ?></td>
                                            <td><?php echo $order->phone_number; ?></td>
                                            <td><?php echo $order->name; ?></td>
                                            <td><?php echo $order->quantity; ?></td>
                                            <td><?php echo $order->net_amount; ?></td>
                                            <td><?php echo date('d-m-Y',strtotime($order->date)); ?> <br> <?php echo date('h:i a',strtotime($order->date)); ?></td>
                                            <td>

                                            <a title="Edit Order" class="btn btn-primary" href="<?php echo base_url(); ?>Orders/Edit/<?php echo $order->order_id; ?>"><i class="fas fa-edit"></i></a>

                                            <a title="Delete Order" class="btn btn-danger" onclick="return confirm('Delete this order?');" href="<?php echo base_url(); ?>Orders/Delete/<?php echo $order->order_id; ?>"><i class="fas fa-trash-alt"></i></a>

                                            <a title="Download Invoice" class="btn btn-success"  href="<?php echo base_url(); ?>Orders/Invoice/<?php echo $order->order_id; ?>"><i class="fas fa-file-invoice-dollar"></i></a>


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