<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Load Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" type = "text/css" href = "../assets/css/main.css"> 

        <script type="text/javascript" src="../assets/js/main.js"></script>

        <script>
            var d = '<?= site_url();?>';
            // remove 'index' from base url string.        I had issues with this, normally base_url() is available, but due to helper problems i couldn't get it working... i blame my work for using code igniter 3. ;p
            d = d.slice(0, -5);

            <?php if(isset($_SESSION['ListID'])):?>
                var listID = '<?=$_SESSION['ListID'];?>';
            <?php endif;?>
        </script>


        <title>Shopping List</title>

       
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="home">Menu</a>
                <button id="navbar-toggler" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="food">Foods</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="list">Shopping List</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container mt-5">