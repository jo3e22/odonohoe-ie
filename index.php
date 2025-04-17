<?php define('MAIN_INCLUDED', 1);?>
<?php include 'header.php'; ?>

<main class="<?php echo $isMobile ? 'mobile' : 'desktop'; ?>">      
    <section id="about">
        <h2><?php echo $lang['about']; ?></h2>
        <p><?php echo $lang['welcome']; ?></p>
    </section>

    <section id="cv">
        <h2><?php echo $lang['cv']; ?></h2>
        <p>Download my CV: <a href="uploads/my_cv.pdf" target="_blank">Click here</a></p>
    </section>
    
    <section id="contact">
        <h2><?php echo $lang['contact']; ?></h2>
        <?php if (isset($_GET['success'])): ?>
            <p>Thank you for your message! I will get back to you soon.</p>
        <?php endif; ?>
        <form action="contact.php" method="post">
            <label for="email">Email:</label>
            <input type="email" placeholder="example@example.com" id="email" name="email" required>
            <br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <!-- Hidden token input -->
            <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

            <button type="submit">Send Message</button>
        </form>
    </section>

    <script>
        document.querySelector('form').addEventListener('submit', function() {
            document.querySelector('button[type="submit"]').disabled = true;
        });
    </script>

</main>

<?php include 'footer.php'; ?>