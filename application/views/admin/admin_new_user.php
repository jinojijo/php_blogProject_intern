<?php $this->load->view("admin/header"); ?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

            <form class="form-signin" action="<?= base_url().'admin/login/add_new_user' ?>" method="post">

                <label for="username" >Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">
            
                <br/>
                <label for="inputPassword" >Password</label>
                <input type="text" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">

                <br/>
                <button class="btn btn-sm btn-primary btn-block" type="submit">Add User</button>
                <a 
                    class="btn btn-sm btn-secondary btn-block" 
                    href="<?= base_url().'admin/dashboard/user_data' ?>"
                >
                    Cancel
                </a>
            </form>
            
        </div>
    </main>

<?php $this->load->view('admin/footer.php'); ?>
