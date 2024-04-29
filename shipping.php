<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
    <link rel="stylesheet" href="/Assignment7/styles/shipping.css">
</head>

<body>
    <?php include './view/header.php' ?>
    
    
    <?php include './view/nav_bar.php' ?>
    
    <main>
        <?php include './view/aside.php' ?>
        
        <section>
            <h2>Shipping Costs</h2>
            
            <label for="productCost">Product Cost:</label> 
            <input type="number" id="productCost" name="productCost">
            <input type="button" id="calculate" value="Calculate"><br>
            <label for="totalCost">Total cost, including shipping:</label>
            <input type="text" id="totalCost" disabled>

        </section>
    </main>
    
    <script src="/Assignment7/scripts/shipping.js"></script>
    
    <?php include './view/footer.php' ?>
    <script src="/Assignment7/scripts/shipping.js"></script>
    <script src="/Assignment7/scripts/date.js"></script>
</body>