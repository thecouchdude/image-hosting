<div class="images">
            <div class="row">  
		  
                <?php foreach($results as $image):?>
                <div class="col-md-4">
                    <img src="<?php echo $image['url'];?>">
                </div>
                <div class="col-md-4">
                    <label>Name :</label>
                    <?php echo $image['name'];?>
                    <br />
                    <label>Uploaded by :</label>
                    <?php echo $image['email'];?>
                    <br />
                    <label>Description :</label>
                    <?php echo $image['des'];?>
                    <br />
                    <a class="btn btn-primary" href="<?php echo base_url().'searchc/'?>">Back</a>
                    <?php $img=$image['url']; ?>
                    <a class="btn btn-primary" href="<?php echo base_url().'searchc/download/'.$image['url']?>">Download</a>
		    <br />
		    <?php echo form_open(base_url().'searchc/wishlist/'.$image['url']);
		    echo form_submit('submit', 'Add to wishlist', "class='submit'");
		    echo form_close(); ?>
		    <?php if (strlen($status) > 0): echo '<div class="alert alert-danger">' . $status . '</div>'; endif?>
		    
                <br /><br />       
                <?php
                // Form Open
                echo form_open(base_url().'searchc/comment/'.$image['url']);
                echo "<div class='textbox'>";    
                // Name Field
                echo form_input(array('id' => 'comment', 'name' => 'comment','placeholder' => 'Comment'));
                echo form_submit('submit', 'Add Comment', "class='submit'"); ?>
                <?php echo "</div>";?>    
                <?php echo form_close(); ?>
                <?php endforeach;?> 
                <br /><br />
                <hr>    
                <label>Comments</label><br />
                <?php foreach($comments as $comment):?>
                    <?php echo "<h6>User:</h6>";?>
                    <?php echo $comment['email'];?>
                    <?php echo "<h6>Commented:</h6>";?>
                    <?php echo $comment['comments'];?>
                    <br />
                    <hr>
                <?php endforeach;?>
                </div>    
            </div> 
</div>