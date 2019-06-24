<main class="container">
    <!-- Show the main content if user logged in -->
        
    <div id="container">
        <?php echo form_open_multipart(base_url().'uploadc'); ?>
        <h4>Enter details</h4><hr/>
        <?php echo form_label('Category :&emsp;&emsp;&nbsp;&nbsp;&nbsp;'); ?>
        <?php
        $options = array(
            'beach'  => 'beach',
            'indoor' => 'indoor',
            'plant'  => 'plant'
        );
        echo form_dropdown('topic', $options, 'beach');
        ?>
        <br />
        
        <?php echo form_label('Name :&emsp;&emsp;&emsp;&emsp;'); ?>
        <?php echo form_input(array('id' => 'name', 'name' => 'name','placeholder' => 'Name for image')); ?><br />
        
        <?php echo form_label('Image :&emsp;&emsp;&emsp;&emsp;'); ?>
        <?php echo form_upload('userfile'); ?><br />

        <?php echo form_label('Description :&emsp;&nbsp;&nbsp;'); ?><br />
        <?php echo form_textarea(array('id' => 'des', 'name' => 'des','placeholder' => 'Description')); ?><br />
        <br />
        
        <?php echo form_submit('upload','Upload');?>
        <?php echo form_close(); ?><br/>
        <div id="msg">    
        </div>
    </div>    
        <div class="images">
            <div class="row">    
                <?php foreach($images as $image):?>
                <div class="col-md-4">
                <a href="#">
                    <img src="<?php echo $image['url'];?>" class="img-fluid">
                </a>
                </div>
                <?php endforeach;?> 
            </div> 
        </div>
        
</main>