const fs = require('fs');

// Get the current date and time
const currentTimestamp = new Date().toLocaleString();

// Write the timestamp to the file
fs.writeFileSync('update-timestamp.txt', currentTimestamp);

console.log('Update timestamp:', currentTimestamp);
