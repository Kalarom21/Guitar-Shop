<!DOCTYPE html>

<html lang="en">
    
<head>
    <title>The Guitar Store</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/Assignment7/styles/main.css">
    <link rel="stylesheet" href="/Assignment7/styles/products.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script src="/Assignment7/scripts/support.js"></script>
</head>

<body>
    <?php include './view/header.php'; ?>
    
    
    <?php include './view/nav_bar.php'; ?>

    
    <main>
        <?php include './view/aside.php'; ?>
        
        <section>
            <nav>
                <form action="/Assignment7/index.php" method="get">
                    <select id="categoryDropdown" name="category_id">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category['category_id']; ?>"
                                <?php if ($category['category_id'] == $category_id) echo 'selected'; ?>>
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <span> <== </span>
                    <input type="submit" value="Choose">
                </form>
            </nav>

            
        <h2><?php echo $category_name; ?></h2>
        <table>
            <tr>
                <th>Product ID</th>
                <th>Name</th>
                <th class="right_aline">Price</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th> 
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['product_id']; ?></td>
                    <td><?php echo $product['product_name']; ?></td>
                    <td class="right_aline"><?php echo $product['list_price']; ?></td>
                    <td>
                        <form action="/Assignment7/index.php" method="get">
                            <input type="hidden" name="action" value="edit_product">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="submit" value="Edit">
                        </form>
                    </td>
                    <td>
                        <form action="/Assignment7/index.php" method="post">
                            <input type="hidden" name="action" value="delete_product">
                            <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                            <input type="hidden" name="category_id" value="<?php echo $product['category_id']; ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p><a href="/Assignment7/index.php">Add Product</a></p>
        </section>
    </main> 
    <?php include './view/footer.php'; ?>

</body>