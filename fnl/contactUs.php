    <?php require_once "header.php"; ?>
    <main>
        <div class="bg">
        <div class="contact-details">
            <h1>Contact Details</h1>
            <div class="contact-section">
                <h2><?php echo $result['set_title']; ?></h2>
                <p><?php echo $result['set_address']; ?></p>
                <p><?php echo $result['set_phone']; ?></p>
                <p><?php echo $result['set_mail']; ?></p>
            </div>
            </div>
        </div>
    </main>
    <?php require_once "footer.php"; ?>