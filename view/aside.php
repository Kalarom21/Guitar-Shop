<aside>
    <nav id="nav_list">
        <ul>
            <?php foreach ($product_categories as $aside) : ?>
                <li><a href="?action=<?php echo strtolower($aside['category_name']); ?>">
                    <?php echo $aside['category_name']; ?>
                </a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>