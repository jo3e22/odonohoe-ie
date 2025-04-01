// js/font-toggle.js

// Get the button and body elements
const fontToggleButton = document.getElementById('font-toggle');
const body = document.body;

// Set a variable to track the current font weight
let currentFont = 'Open Dyslexic'; // Default font

// Add an event listener to the button
fontToggleButton.addEventListener('click', () => {
    if (currentFont === 'Open Dyslexic') {
        // Change to Roboto font
        body.style.fontFamily = 'Roboto, sans-serif';
        fontToggleButton.textContent = 'Switch to Open Dyslexic'; // Update button text
        currentFont = 'Roboto';
    } else {
        // Change to Open Dyslexic font
        body.style.fontFamily = 'Open Dyslexic, sans-serif';
        fontToggleButton.textContent = 'Switch to Roboto'; // Update button text
        currentFont = 'Open Dyslexic';
    }
});
