<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
    <link rel="stylesheet" href="/Assignment7/styles/customer_login.css">
</head>

<body>
    <?php include 'view/header.php' ?>
    
    
    <?php include 'view/nav_bar.php' ?>

    
    <main>
        <?php include 'view/aside.php'?>
        
        <section>
            <h2>Customer Login</h2>
            
            <form action ="/Assignment7/index.php" method ="post">
                <input type="hidden" name="action" value="customer_page">
                <label for="email">Email Address:</label> 
                <input type="text" name="email" value= "<?php echo $email ?>"><br>
                <input type="submit" id="login" value="Login">
                <input type="submit" id="cancel" value="Cancel">
            </form>
            
        </section>
    </main>
    <?php if (isset($error_message)) : ?>
        <script>
            alert("<?= $error_message ?>");
        </script>
    <?php endif; ?>
    <?php include 'view/footer.php' ?> 
</body>


