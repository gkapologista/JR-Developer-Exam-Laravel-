document.addEventListener('DOMContentLoaded', function () {
    const cityDropdown = document.getElementById('city_id');
    const barangayDropdown = document.getElementById('barangay_id');

    cityDropdown.addEventListener('change', function () {
        const cityId = this.value;
        fetchBarangaysForCity(cityId);
    });

    function fetchBarangaysForCity(cityId) {
        fetch(`/cities/${cityId}/barangays`)
            .then(response => response.json())
            .then(barangays => updateBarangayDropdown(barangays))
            .catch(error => console.error('Error fetching barangays:', error));
    }

    function updateBarangayDropdown(barangays) {
        barangayDropdown.innerHTML = '<option value="">Select a Barangay</option>';
        barangays.forEach(barangay => {
            const option = document.createElement('option');
            option.value = barangay.id;
            option.textContent = barangay.name;
            barangayDropdown.appendChild(option);
        });
    }
});
