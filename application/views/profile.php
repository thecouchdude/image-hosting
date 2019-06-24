<main class="container">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/Main.css">
    <link href='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js' type='text/javascript'></script>
    <link href='<?= base_url() ?>resources/dropzone.css' type='text/css' rel='stylesheet'>
    <script src='<?= base_url() ?>resources/dropzone.js' type='text/javascript'></script>
    <head>
        <script type="text/javascript">
            // Ajax post
            $(document).ready(function() {
                $(".submit").click(function(event) {
                    event.preventDefault();
                    var fname = $("input#fname").val();
                    var lname = $("input#lname").val();    
                    jQuery.ajax({
                        type: "POST",
                        url: "<?php echo base_url().'profile/update'?>",
                        dataType: 'json',
                        data: {fname: fname, lname: lname},
                        success: function(res) {
                            if (res){
                                // Show Entered Value
                                jQuery("div#result").show();
                                jQuery("div#fvalue").html(res.fname);
                                jQuery("div#lvalue").html(res.lname);
                            }
                        }
                    });
                });
            });
        </script>
    </head>
        <h1 align="center">User Profile</h1>
        <h4 align="center">Feel free to take a look around and explore the world</h4> 
        <hr>
        <br />
        <h4>User Data</h4>
        <table>
            <tr>
                <td><strong>First Name &emsp;</strong></td>
                <td><strong>Last Name &emsp;</strong></td>
                <td><strong>Email</strong></td>
            </tr> 
            <?php foreach($posts as $post):?>
            <tr>
                <td><?php echo $post->firstname;?></td>
                <td><?php echo $post->lastname;?></td>
                <td><?php echo $post->email;?></td>
            </tr>     
            <?php endforeach;?>  
       </table>
        <hr>
        
        <?php echo validation_errors(); ?>
<body>
<div class="main">
<div id="textbox">
<h5 id="form_head">Update details</h5><br/>
<?php
// Form Open
echo form_open();
echo "<div class='textbox'>";    
// Name Field
echo form_label('First Name: &emsp;');
echo form_input(array('id' => 'fname', 'name' => 'fname','placeholder' => 'First name'));
echo "<br>";
echo form_label('Last Name: &emsp;');
echo form_input(array('id' => 'lname', 'name' => 'lname','placeholder' => 'Last name'));
?>
<?php echo "<br />"; ?>    
<?php echo form_submit('submit', 'Update', "class='submit'"); ?>
<?php echo "</div>";?>    
<?php echo form_close(); ?>    
<?php
echo "<br>";    
echo "<div id='result' style='display: none'>";
echo "<br/>";
echo "<label class='label_output'>Name entered :<div id='fvalue'> </div></label>";
echo "<br>";
echo "<label class='label_output'>Entered lastname :<div id='lvalue'> </div></label>";
echo "<h5 id='result_id'>Refresh to apply changes !</h5><br/>";    
echo "</div>";    
?>
<script>
    // Add restrictions
    Dropzone.options.fileupload = {
      acceptedFiles: 'image/*',
      maxFilesize: 1 // MB
    };
</script>
<br />    
<br />
<br />
<br />    
<hr>
<br />
<!--    
<div id="upload">
    <form method='post' action='<?php #echo base_url().'profile'; ?>' enctype='multipart/form-data'>
        <input type='file' name='files[]' multiple > 
        <input type='submit' value='Upload' name='upload' />
    </form>
</div>
-->
<br />
<h3>Wishlist</h3>
<br />
<div class="images">
            <div class="row">    
                <?php foreach($images as $image):?>
                <div class="col-md-4">
                     <img src="<?php echo $image['url'];?>" class="img-fluid">
		     <a href="<?php echo base_url().'profile/remove/'.$image['url']?>">Remove</a>
                </div>
                <?php endforeach;?> 
            </div> 
        </div>
</div>
<br />    
<hr>

<div class='content'>
      <!-- Dropzone -->
      <form action="<?= base_url('profile') ?>" class="dropzone" id="upload" method="post">
      </form> 
</div>
</div>    
</body>
    </main>

    