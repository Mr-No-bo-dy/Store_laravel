import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

window.onload = () => {

    // Show-Hide User's dropdown menu
    if (document.getElementById("user-menu-button")) {
        let menuButton = document.getElementById("user-menu-button");
        let dropdownMenu = document.querySelector("[aria-labelledby='user-menu-button']");

        menuButton.addEventListener("click", function() {
            dropdownMenu.classList.remove("hidden");
        });

        document.addEventListener("click", function(event) {
            if (!menuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add("hidden");
            }
        });
    }

    // Add new status when creating new Product
    if (document.getElementById("addNewStatus")) {
        let status = document.getElementById("status");
        let label_status = document.querySelector('label[for="status"]');
        let status_new = document.getElementById("status_new");
        let label_status_new = document.querySelector('label[for="status_new"]');

        document.getElementById("addNewStatus").addEventListener('click', function (event){
            event.preventDefault();
            status.name = "";
            label_status.setAttribute("class", "hidden");
            status_new.name = "status";
            status_new.setAttribute('type', 'text');
            label_status_new.setAttribute("class", "block");
        });

        document.getElementById("removeNewStatus").addEventListener('click', function (event){
            event.preventDefault();
            status.name = "status";
            label_status.setAttribute("class", "block");
            status_new.name = "";
            status_new.setAttribute('type', 'hidden');
            label_status_new.setAttribute("class", "hidden");
        });
    }

}
