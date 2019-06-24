<div class="jumbotronsignin">
<main class="container text-center">
    <div class="row"></div>
        <div class="row mb-4">
            <div class="col"></div>
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <form id="form-login" class="mx-4 mb-4 text-center" action="<?php echo base_url();?>users/login" method="POST">
                    <h2 class="mb-4">Enter Log in details</h2>

                    <?php if (strlen($status) > 0): echo '<div class="alert alert-danger">' . $status . '</div>'; endif?>
                                        
                    <input type="email" name="email" placeholder="Email address" class="form-control mt-3 mb-1" 
                    value="<?php if (isset($_COOKIE["email"])): echo $_COOKIE["email"]; endif ?>" required>
                    <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
                    <input type="checkbox" id="remember" name="remember" 
                        <?php if (isset($_COOKIE["email"])): echo "checked"; endif ?>
                    class="mb-4">
                    <label for="remember">Remember my email</label>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
                <div class="container text-center">
                    <label class="signup">No Account? <a href="<?php echo base_url().'signupc/';?>">Register</a></label>
                </div>    
            </div>
            <div class="col"></div>
        </div>
    </main>
</div>    