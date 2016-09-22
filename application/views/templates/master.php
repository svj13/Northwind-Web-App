<?php "<!DOCTYPE html>"; ?>


<link href="<?php echo base_url("styles/nwstyles.css"); ?>" rel="stylesheet" type="text/css">

<html>
<head>
    <title><?php echo $title; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <!-- site banner, menu etc would go here -->
    
    <!-- Message Banner -->
    <div style="background-color: #6EC8F5; border: 2px solid BLACK; margin: 10px; padding: 20px; font-weight: bold; text-align: center;">
        <font size="6">Northwind Product Browser</font>
    </div>
    
    <!-- Navigation Menu -->
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #6EC8F5;
           }

        li {
            float: left;
        }

        li a {
            display: block;
            color: black;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #6898f3;
        }
    </style>
    <ul>
        <li><a href="<?php  echo site_url("product") ?>">Product</a></li>
        <li><a href="<?php  echo site_url("order") ?>">Order</a></li>
        <li><a href="<?php  echo site_url("about") ?>">About</a></li>
        <li><a href="<?php  echo site_url("login") ?>">Login</a></li>
        
        
    </ul>
    
    

    
    
    <?php echo $content; ?>
    <hr>
    <p style="font-weight:bold"> Sarah Jackson &copy; 2016</p>
</body>
</html>