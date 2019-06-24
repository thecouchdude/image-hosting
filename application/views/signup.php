        
<div class="jumbotronsignin">
<main class="container text-center">
    <div class="row"></div>
        <div class="row mb-4">
            <div class="col"></div>
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <form id="form-login" class="mx-4 mb-4 text-center" action="<?php echo base_url().'signupc';?>" method="POST">
                <h1>Enter your details</h1><hr/>
                <input type="text" name="firstname" id="firstname" placeholder="First name" class="form-control mt-3 mb-1">

                <input type="text" name="lastname" id="lastname"placeholder="Last name" class="form-control mt-3 mb-1">

                <input type="email" name="email" placeholder="Email address" class="form-control mt-3 mb-1">

                <input type="text" name="password" id="password"placeholder="password" class="form-control mt-3 mb-1">

                <input type="text" name="Cpassword" id="Cpassword"placeholder="Confirm password" class="form-control mt-3 mb-1">

                <?php echo form_submit(array('class'=>'btn btn-primary btn-lg','id' => 'submit', 'value' => 'Submit')); ?>
                <?php echo form_close(); ?><br/>
                </form>    
            </div>    
        <div class="col"></div>
</div>
</main>
</div>    