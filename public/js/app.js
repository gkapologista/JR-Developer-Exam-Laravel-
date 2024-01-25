document.addEventListener('DOMContentLoaded', function () {
    // Get references to the city and barangay dropdown elements
    const cityDropdown = document.getElementById('city_id');
    const barangayDropdown = document.getElementById('barangay_id');

    // Add an event listener for when the selected city changes
    cityDropdown.addEventListener('change', function () {
        const cityId = this.value;
        fetchBarangaysForCity(cityId); // Fetch barangays for the selected city
    });

    // Fetch barangays for a specific city from the server
    function fetchBarangaysForCity(cityId) {
        fetch(`/cities/${cityId}/barangays`) // Send request to the server
            .then(response => response.json()) // Parse the response as JSON
            .then(barangays => updateBarangayDropdown(barangays)) // Update the barangay dropdown
            .catch(error => console.error('Error fetching barangays:', error)); // Log errors, if any
    }

    // Update the barangay dropdown based on the barangays received
    function updateBarangayDropdown(barangays) {
        barangayDropdown.innerHTML = '<option value="">Select a Barangay</option>'; // Reset dropdown
        barangays.forEach(barangay => {
            const option = document.createElement('option'); // Create a new option element
            option.value = barangay.id; // Set the value
            option.textContent = barangay.name; // Set the display text
            barangayDropdown.appendChild(option); // Add the option to the dropdown
        });
    }
});
