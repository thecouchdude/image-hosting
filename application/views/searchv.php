<div class="jumbotronhome">
        <div class="container">
        <br />
        <br />
        <br />
        <h1>Search</h1>    
        <div class="ui-widget">   
        <?php
            // Form Open
            echo form_open(base_url().'searchc');
            echo form_input(array('id' => 'topic', 'name' => 'topic','placeholder' => 'Search'));
        ?>
        <?php echo form_submit('submit', 'Search', "class='submit'"); ?>
        <?php echo form_close(); ?>
        </div>    
        </div>    
    </div>
    <?php if (count($result)>0): ?>
        <h4><?php echo count($result);?> matches found</h4>
        <div class="images">
            <div class="row">    
                <?php foreach($result as $image):?>
                <div class="col-md-4">
                <a href="<?php echo base_url().'searchc/search/'.$image['url']?>">
                    <img src="<?php echo $image['url'];?>" class="img-fluid">
                </a>
                </div>
                <?php endforeach;?> 
            </div> 
        </div>
        <hr>
    <?php else: ?>
            <p class="text-center">No Matches Found</p> 
    <?php endif ?>

    