<?php define('MAIN_INCLUDED', 1);?>
<?php include 'header.php'; ?>

<main class="<?php echo $isMobile ? 'mobile' : 'desktop'; ?>">      
    <section id="about">
        <h2><?php echo $lang['about']; ?></h2>
        <p><?php echo $lang['welcome']; ?></p>
    </section>

    <section id="cv">
        <h2><?php echo $lang['cv']; ?></h2>
        <p><?php echo $lang['cv-paragraph']; ?><a href="uploads/my_cv.pdf" target="_blank"><?php echo $lang['cv-click']; ?></a></p>
    </section>
    
    <section id="contact">
        <h2><?php echo $lang['contact']; ?></h2>
        <?php if (isset($_GET['success'])): ?>
            <p> <?php echo $lang['contact-success']; ?> </p>
        <?php endif; ?>
        <form action="contact.php" method="post">
            <label for="email"><?php echo $lang['contact-email']; ?>:</label>
            <input type="email" placeholder=<?php echo $lang['contact-email-placeholder']; ?> id="email" name="email" required>
            <br>
            <label for="message"><?php echo $lang['contact-message']; ?>:</label>
            <textarea id="message" name="message" required></textarea>
            
            <!-- Hidden token input -->
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

            <button type="submit"><?php echo $lang['contact-send']; ?></button>
        </form>
    </section>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('button[type="submit"]').disabled = true;
        });
    </script>

</main>

<?php include 'footer.php'; ?>