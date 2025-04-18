document.addEventListener('DOMContentLoaded', function () {
    const languageSelect = document.getElementById('language-select');

    if (languageSelect) {
        languageSelect.addEventListener('change', function () {
            const selectedLanguage = this.value;

            // Set the language cookie
            document.cookie = `language=${selectedLanguage}; path=/; max-age=${86400 * 365}`;

            // Reload the page to apply the new language
            location.reload();
        });
    }
});