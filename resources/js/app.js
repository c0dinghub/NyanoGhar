import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

// Show/hide rent or sale fields based on selected status
document.getElementById("status").addEventListener("change", function () {
    var rentFields = document.getElementById("rentFields");
    var saleFields = document.getElementById("saleFields");
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

 // Show/hide property type fields based on selected property type
 document.getElementById('property_type').addEventListener('change', function() {
    var houseFields = document.getElementById('houseFields');
    var apartmentFields = document.getElementById('apartmentFields');

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

//loaction js
// document.getElementById("province").addEventListener("change", function () {
//     let provinceId = this.value;
//     let districtSelect = document.getElementById("district");
//     let localBodySelect = document.getElementById("local_body");

//     districtSelect.disabled = true;
//     localBodySelect.disabled = true;

//     if (provinceId) {
//         fetch(`/get-districts/${provinceId}`)
//             .then((response) => response.json())
//             .then((data) => {
//                 districtSelect.innerHTML =
//                     '<option value="">Select District</option>';
//                 data.forEach((district) => {
//                     districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
//                 });
//                 districtSelect.disabled = false;
//             });
//     }
// });

// document.getElementById("district").addEventListener("change", function () {
//     let districtId = this.value;
//     let localBodySelect = document.getElementById("local_body");

//     localBodySelect.disabled = true;

//     if (districtId) {
//         fetch(`/get-local-bodies/${districtId}`)
//             .then((response) => response.json())
//             .then((data) => {
//                 localBodySelect.innerHTML =
//                     '<option value="">Select Local Body</option>';
//                 data.forEach((localBody) => {
//                     localBodySelect.innerHTML += `<option value="${localBody.id}">${localBody.name}</option>`;
//                 });
//                 localBodySelect.disabled = false;
//             });
//     }
// });

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("province").addEventListener("change", function () {
        let provinceId = this.value;
        let districtSelect = document.getElementById("district");
        let localBodySelect = document.getElementById("local_body");

        districtSelect.disabled = true;
        localBodySelect.disabled = true;

        if (provinceId) {
            fetch(`/get-districts/${provinceId}`)
                .then((response) => response.json())
                .then((data) => {
                    districtSelect.innerHTML = '<option value="">Select District</option>';
                    data.forEach((district) => {
                        districtSelect.innerHTML += `<option value="${district.id}">${district.name}</option>`;
                    });
                    districtSelect.disabled = false;
                });
        }
    });

    document.getElementById("district").addEventListener("change", function () {
        let districtId = this.value;
        let localBodySelect = document.getElementById("local_body");

        localBodySelect.disabled = true;

        if (districtId) {
            fetch(`/get-local-bodies/${districtId}`)
                .then((response) => response.json())
                .then((data) => {
                    localBodySelect.innerHTML = '<option value="">Select Local Body</option>';
                    data.forEach((localBody) => {
                        localBodySelect.innerHTML += `<option value="${localBody.id}">${localBody.name}</option>`;
                    });
                    localBodySelect.disabled = false;
                });
        }
    });
});

