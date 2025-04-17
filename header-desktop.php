<header>
    <nav>
        <div class="left-items">
            <ul>
                <li><a href="#cv"><?php echo $lang['cv-short']; ?></a></li>
                <li><a href="#about"><?php echo $lang['about']; ?></a></li>
                <li><a href="#contact"><?php echo $lang['contact']; ?></a></li>
            </ul>
        </div>
        
        <div class="logo">
            <a href="index.php"><img src="images/logo-122620-fffef9.png" alt="My Website Logo" style="height:100px;"></a>
        </div>
        <div class="right-items">
            <button id="font-toggle"><?php echo $lang['header-toggle-font']; ?></button> <!-- Button to toggle fonts -->

            <section id="languageSection">
                <div class="language-switcher">
                    <select id="language-select" name="language" onchange="setLanguage(this.value)">
                        <option value="en" <?php echo $language === 'en' ? 'selected' : ''; ?>>English</option>
                        <option value="fr" <?php echo $language === 'fr' ? 'selected' : ''; ?>>Français</option>
                        <!-- Add more languages as needed -->
                    </select>
                </div>
            </section>

            <!-- Search Section -->
            <section id="searchSection">
                <div class="search-container">
                    <input type="text" id="searchInput" placeholder=<?php echo $lang['header-search-placeholder']; ?> required>
                    <button id="searchButton" onclick="performSearch()"><?php echo $lang['header-search']; ?></button>
                </div>
                <div id="feedback"></div>
            </section>
        </div>
    </nav>
</header>