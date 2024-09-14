document.getElementById("viewFeaturesBtn").addEventListener("click", function() {
    var featuresSection = document.getElementById("featuresSection");

    if (featuresSection.classList.contains("show")) {
        featuresSection.classList.remove("show");
    } else {
        featuresSection.style.display = "block";  // Make it visible first
        setTimeout(function() { 
            featuresSection.classList.add("show"); 
        }, 10);  // Delay to allow transition to take effect
    }
});