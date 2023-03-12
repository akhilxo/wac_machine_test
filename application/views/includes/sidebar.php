 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url(); ?>">
   
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url(); ?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">


<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link <?php if($this->uri->segment(1)!="Products") { echo "collapsed"; } ?>" href="#" data-toggle="collapse" data-target="#product_menu"
        aria-expanded="true" aria-controls="product_menu">
        <i class="fas fa-cubes"></i>
        <span>Products</span>
    </a>
    <div id="product_menu" class="collapse <?php if($this->uri->segment(1)=="Products") { echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>Products/Add">Add Product</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>Products">Manage Products</a>
        </div>
    </div>
</li>



<li class="nav-item">
    <a class="nav-link <?php if($this->uri->segment(1)!="Orders") { echo "collapsed"; } ?>" href="#" data-toggle="collapse" data-target="#order_menu"
        aria-expanded="true" aria-controls="order_menu">
        <i class="fas fa-shopping-cart"></i>
        <span>Orders</span>
    </a>
    <div id="order_menu" class="collapse  <?php if($this->uri->segment(1)=="Orders") { echo "show"; } ?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url(); ?>Orders/Add">Add Order</a>
            <a class="collapse-item" href="<?php echo base_url(); ?>Orders">Manage Orders</a>
        </div>
    </div>
</li>





<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>




</ul>
<!-- End of Sidebar -->

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
  