<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <?php include '../view/team_nav.php'; ?>
    </aside>
    <section>
        <h1><?php echo $name; ?></h1>
        <div id="left_column">
            <p>
                <img src="<?php echo $image_filename; ?>"
                    alt="<?php echo $image_alt; ?>">
            </p>
        </div>

       
        
    </section>
</main>
<?php include '../view/footer.php'; ?>