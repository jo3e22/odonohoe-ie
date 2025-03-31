<?php include 'header.php'; ?>

<main>    
    <section id="about">
        <h2>About Me</h2>
        <p>Information about yourself, your background, and your interests.</p>
    </section>

    <section id="cv">
        <h2>Curriculum Vitae</h2>
        <p>Download my CV: <a href="uploads/my_cv.pdf" target="_blank">Click here</a></p>
    </section>
    
    <section id="contact">
        <h2>Contact Me</h2>
        <?php if (isset($_GET['success'])): ?>
            <p>Thank you for your message! I will get back to you soon.</p>
        <?php endif; ?>
        <form action="contact.php" method="post">
            <label for="email">Email:</label>
            <input type="email" placeholder = "example@example.com" id="email" name="email" required>
            <br>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Send Message</button>
        </form>
    </section>

</main>

<?php include 'footer.php'; ?>