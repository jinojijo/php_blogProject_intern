<?php $this->load->view("admin/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
       <?php
          
       ?>
      </div>

      <div class="row">
         <div class="col-md-3 alert alert-primary" role="alert">
          <a href="<?= base_url().'admin/blog/' ?>">View Blog</a>
        </div>
        <div class="col-md-1"></div>
         <div class="col-md-3 alert alert-warning" role="alert">
          <a href="<?= base_url().'admin/blog/addblog' ?>">Add Blog</a>
        </div>

      </div>
    </main>

<?php $this->load->view('admin/footer.php'); ?>