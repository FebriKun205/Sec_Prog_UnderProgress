document.addEventListener('DOMContentLoaded', function () {
    const postBtn = document.getElementById('post-btn');
    const titleField = document.getElementById('title');
    const forumField = document.getElementById('forum');
    const fileInput = document.getElementById('upload-image');
    
    // Create a span for displaying the file name
    const fileNameDisplay = document.createElement('span'); 
    fileNameDisplay.id = 'file-name'; // Set ID for the span
    fileNameDisplay.className = 'text-gray-700'; // Set default class for the span
    fileInput.parentNode.insertBefore(fileNameDisplay, fileInput.nextSibling); // Insert the span after the file input

    function checkFields() {
        if (titleField.value !== '' && forumField.value !== '') {
            postBtn.classList.remove('bg-gray-400', 'cursor-not-allowed');
            postBtn.classList.add('bg-indigo-600', 'hover:bg-indigo-500');
            postBtn.removeAttribute('disabled'); // Enable the button
        } else {
            postBtn.classList.remove('bg-indigo-600', 'hover:bg-indigo-500');
            postBtn.classList.add('bg-gray-400', 'cursor-not-allowed');
            postBtn.setAttribute('disabled', 'disabled'); // Disable the button
        }
    }

    // Add event listeners to the fields to track changes
    titleField.addEventListener('input', checkFields);
    forumField.addEventListener('input', checkFields);
    fileInput.addEventListener('change', updateFileName); // Add change event for file input

    function updateFileName() {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = fileInput.files[0].name; // Display the file name
            fileNameDisplay.classList.remove('text-gray-700'); // Remove default color
            fileNameDisplay.classList.add('text-indigo-400', 'font-semibold'); // Add indigo color and bold style
        } else {
            fileNameDisplay.textContent = ''; // Clear if no file is selected
            fileNameDisplay.classList.remove('text-indigo-400', 'font-semibold'); // Reset styles
            fileNameDisplay.classList.add('text-gray-700'); // Set back to default style
        }
    }
});
