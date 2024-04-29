<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
</head>

<body>
    <header>
        <img src="images/FenderStratocaster.png" alt ="Fender Stratocaster">
        <h2>The Guitar Store</h2>
        <h3>For rock stars everywhere!</h3>
    </header>
    
    
    <nav id="nav_menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="lessons/index.php">Lessons</a></li>
            <li><a href="products/index.php">Products</a></li>
            <li><a href="support/index.php">Support</a></li>
            <li><a href="shipping/index.php">Shipping</a></li>
            <li class="lastitem">
                <a href="contact/index.php">Contact Us</a>
                <ul>
                    <li><a href="contact/email.php">Email</a></li>
                    <li><a href="contact/phone.php">Phone</a></li>
                    <li><a href="contact/liveChat.php">Live Chat</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    
    <main>
        <aside>
            <nav id="nav_list">
                <ul>
                    <li><a href="products/guitars/guitars.php">Guitars</a></li>
                    <li><a href="products/basses/basses.php">Basses</a></li>
                    <li><a href="products/drums/drums.php">Drums</a></li>
                    <li><a href="products/keyboards/keyboards.php">Keyboards</a></li>
                </ul>
            </nav>
        </aside>
        <section>
            <p> Error: Unable to connect to the database </p>
        </section>
    </main>
        
    <footer>
        &copy; 2023 The Guitar Store
        <p id="currentDate"></p>
    </footer>
    
    <script src="/Assignment7/scripts/date.js"></script>  
</body>
        