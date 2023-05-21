<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://getbootstrap.com/docs/4.4/examples/sign-in/signin.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <title>Login</title>
    </head>
    
    <body>
        <form class="form-signin" action="<?= base_url().'admin/login/login_post' ?>" 
            method="post">

        <!-- for invalid creditials  -->
        <?php
            if($error != "NO_ERROR")
            {
                echo '<div class="alert alert-danger" role="alert">';
                echo $error;
                echo "</div>";
            }
        ?>

        <!-- for new user confirmation  -->
        <?php
            if($new_user != "NO_ERROR")
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $new_user;
                echo "</div>";
            }
        ?>
        
        <!-- if account inactive  -->
        <?php
            if($notactive != "NO_ERROR")
            {
                echo '<div class="alert alert-success" role="alert">';
                echo $notactive;
                echo "</div>";
            }
        ?>

        <h1 class="h3 mb-3 font-weight-normal">
            Please sign in
        </h1>

            <label for="username" class="sr-only">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="">
            
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">© 2002 - <?=date("Y");?></p>
            <a href="<?= base_url().'admin/login/new_user' ?>" class="mt-5 mb-3 "> Create Account </a>
        </form>

        

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>