<div class="jumbotron">
                <h1>Welcome to STOCKHOME</h1>
                <h4>Feel free to take a look around and explore the world</h4>       
</div>    
        <!-- Show the main content if user logged in -->
         <?php if (isset($_SESSION["email"])): ?>
            <!-- Website features (about)-->   
            <div class="row">
                <div class="columnhead" style="background-color:#aaa;">
                    <h2>PHOTOS</h2>
                    <p>Share photos seamlessly</p>
                </div>
                <div class="columnhead" style="background-color:#bbb;">
                    <h2>VIDEOS</h2>
                    <p>Upload videos effortlessly</p>
                </div>
                <div class="columnhead" style="background-color:#ccc;">
                    <h2>EDITING</h2>
                    <p>Edit videos</p>
                </div>
            </div>
            <div class="images">
                <div class="row">
                  <div class="col-md-4">
                    <img src="./uploads/1.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/2.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/3.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/4.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/5.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/6.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/7.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/8.jpg" class="img-fluid">
                  </div>
                    <div class="col-md-4">
                    <img src="./uploads/9.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/10.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/11.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/12.jpg" class="img-fluid">
                  </div>    
                </div>       
            </div>    
        
        <!-- Otherwise, show a sign in request -->
        <?php else: ?>   
            <div class="images">
                <div class="row">
                  <div class="col-md-4">
                    <img src="./uploads/1.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/2.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/3.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/4.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/5.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/6.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/7.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/8.jpg" class="img-fluid">
                  </div>
                    <div class="col-md-4">
                    <img src="./uploads/9.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/10.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/11.jpg" class="img-fluid">
                  </div>
                  <div class="col-md-4">
                    <img src="./uploads/12.jpg" class="img-fluid">
                  </div>    
                </div>       
            </div>    
        <?php endif ?>