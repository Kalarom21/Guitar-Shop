<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template

-->
<head>
    <title>Guitars</title>
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
    <link rel="stylesheet" href="/Assignment7/styles/guitars.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>

</head>
<body>
    <?php include './view/header.php' ?>
    
    
    <?php include './view/nav_bar.php' ?>

    
    <main>
        <?php include './view/aside.php' ?>
        
        <section>
            <h2>Our Guitars</h2>
            <p>Check out our fine selection of premium guitars!</p>
            <div class="bxslider">
                <div><img src="/Assignment7/images/guitars/Caballero11.png" title = "Caballero 11"/></div>
                <div><img src="/Assignment7/images/guitars/FenderStrato1.png" title = "Fender Stratocaster"/></div>
                <div><img src="/Assignment7/images/guitars/GibsonLesPaul.png" title = "Gibson Les Paul"/></div>
                <div><img src="/Assignment7/images/guitars/GibsonSB.png" title = "Gibson SB"/></div>
                <div><img src="/Assignment7/images/guitars/WashburnD10S.png" title = "Washburn D10S"/></div>
                <div><img src="/Assignment7/images/guitars/YamahaFG700S.png" title = "Yamaha FG700S"/></div>
            </div>
        </section>
    </main>
        
    <?php include './view/footer.php' ?>
    <script src="/Assignment7/scripts/guitars.js"></script>  
    <script src="/Assignment7/scripts/date.js"></script>  
</body>