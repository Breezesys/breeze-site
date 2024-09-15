document.getElementById("requirements-btn").addEventListener("click", function() {
    toggleDropdown('requirements');
});

document.getElementById("features-btn").addEventListener("click", function() {
    toggleDropdown('features');
});

function toggleDropdown(dropdownId) {
    const dropdown = document.getElementById(dropdownId);
    const otherDropdown = dropdownId === 'requirements' ? document.getElementById('features') : document.getElementById('requirements');
    
    if (dropdown.style.maxHeight) {
        dropdown.style.maxHeight = null;
    } else {
        dropdown.style.maxHeight = dropdown.scrollHeight + "px";
        otherDropdown.style.maxHeight = null;  // Close the other dropdown
    }
}

function toggleDropdown(sectionId) {
    var content = document.getElementById(sectionId);

    // Toggle the show class to activate the sliding and fading effect
    if (content.classList.contains('show')) {
        content.classList.remove('show');
    } else {
        // Close other sections before opening the clicked one
        var dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach(function(drop) {
            drop.classList.remove('show');
        });
        content.classList.add('show');
    }
}

function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.style.display = dropdown.style.display === "none" || !dropdown.style.display ? "block" : "none";
}

document.addEventListener('DOMContentLoaded', function () {
    const requirementsBtn = document.getElementById('requirements-btn');
    const featuresBtn = document.getElementById('features-btn');
    const requirements = document.getElementById('requirements');
    const features = document.getElementById('features');

    function toggleDropdown(target) {
        const current = document.getElementById(target);
        const other = target === 'requirements' ? features : requirements;

        // If currently open, close it
        if (current.style.maxHeight) {
            current.style.maxHeight = null;
            current.style.opacity = 0;
            current.style.transform = "translateY(20px)"; // Slide out downwards
        } else {
            // Otherwise, open it smoothly
            current.style.maxHeight = current.scrollHeight + 'px';
            current.style.opacity = 1;
            current.style.transform = "translateY(0)"; // Reset to slide in from the bottom
            other.style.maxHeight = null;  // Close the other section
            other.style.opacity = 0;
            other.style.transform = "translateY(20px)";
        }
    }

    requirementsBtn.addEventListener('click', () => toggleDropdown('requirements'));
    featuresBtn.addEventListener('click', () => toggleDropdown('features'));
});