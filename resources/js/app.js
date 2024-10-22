import "./bootstrap";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

document.addEventListener('DOMContentLoaded', function () {

    // Show/hide rent or sale fields based on selected status
    const statusSelect = document.getElementById("status");
    const rentFields = document.getElementById("rentFields");
    const saleFields = document.getElementById("saleFields");

    if (statusSelect) {
        statusSelect.addEventListener("change", function () {
            if (this.value === "for_rent") {
                rentFields.classList.remove("hidden");
                saleFields.classList.add("hidden");
            } else if (this.value === "for_sale") {
                saleFields.classList.remove("hidden");
                rentFields.classList.add("hidden");
            } else {
                rentFields.classList.add("hidden");
                saleFields.classList.add("hidden");
            }
        });
    }

    // Show/hide property type fields based on selected property type
    const propertyTypeSelect = document.getElementById('property_type');
    const houseFields = document.getElementById('houseFields');
    const apartmentFields = document.getElementById('apartmentFields');

    if (propertyTypeSelect) {
        propertyTypeSelect.addEventListener('change', function () {
            if (this.value === 'house') {
                houseFields.classList.remove('hidden');
                apartmentFields.classList.add('hidden');
            } else if (this.value === 'apartment') {
                apartmentFields.classList.remove('hidden');
                houseFields.classList.add('hidden');
            } else {
                houseFields.classList.add('hidden');
                apartmentFields.classList.add('hidden');
            }
        });
    }

    // Update budget dropdown based on selected status (for_rent or for_sale)
    const budgetSelect = document.getElementById('budget');
    const budgetsForSale = `
        <option value="">Select Budget</option>
        <option value="under50k">Under Rs 50,000</option>
        <option value="50k-100k">Rs 50,000 - 1 Lakh</option>
        <option value="100k-500k">Rs 1 Lakh - 5 Lakhs</option>
        <option value="500k-20lkh">Rs 5 Lakhs - 20 Lakhs</option>
        <option value="20lkh-50lkh">Rs 20 Lakhs - 50 Lakhs</option>
        <option value="50lkh-1cr">Rs 50 Lakhs - 1 Cr</option>
        <option value="1cr-5cr">Rs 1 Cr - 5 Cr</option>
        <option value="above5cr">Above Rs 5 Cr</option>
    `;

    const budgetsForRent = `
        <option value="">Select Budget</option>
        <option value="under10k">Under Rs 10,000</option>
        <option value="10k-50k">Rs 10,000 - Rs 50,000</option>
        <option value="50k-100k">Rs 50,000 - 1 Lakh</option>
        <option value="100k-200k">Rs 1 Lakh - 2 Lakhs</option>
        <option value="200k-500k">Rs 2 Lakhs - 5 Lakhs</option>
        <option value="above500k">Above Rs 5 Lakhs</option>
    `;

    function updateBudgetOptions() {
        if (statusSelect.value === 'for_sale') {
            budgetSelect.innerHTML = budgetsForSale;
        } else if (statusSelect.value === 'for_rent') {
            budgetSelect.innerHTML = budgetsForRent;
        } else {
            budgetSelect.innerHTML = '<option value="">Select Budget</option>';
        }
    }

    if (statusSelect) {
        statusSelect.addEventListener('change', updateBudgetOptions);
        updateBudgetOptions();
    }

    // Call the function initially to set the correct budget options if a purpose is pre-selected

});
