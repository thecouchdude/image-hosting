<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage Header</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'css/Main.css'?>">
</head>
<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <a class="navbar-brand" href="#">Stockhome</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
        </button>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" action="#">
            <!-- Search button-->  
            <input class="form-control mr-sm-2" type="text" placeholder="Search">
            <button class="btn btn-success" type="submit">Search</button>
            </form>
        </nav>    
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
        <ul class="navbar-nav nav">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url();?>">DISCOVER</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url().'mainc';?>">COLLECTIONS</a>
            </li>    
            <li class="nav-item">
                <?php #little diff from prev php
                    echo '<a class="btn btn-outline-primary" href="'. base_url(). 'users/">Sign in</a>';
                ?>
            </li>    
        </ul>
        </div>  
    </nav> 