document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('#delete-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');
            const confirmModal = document.getElementById("confirmModal");

            confirmModal.style.display = "block";

            const confirmButton = document.getElementById("confirmButton");
            const cancelButton = document.getElementById("cancelButton");

            confirmButton.addEventListener("click", function () {
                form.submit();
                confirmModal.style.display = "none";
            });

            cancelButton.addEventListener("click", function () {
                confirmModal.style.display = "none";
            });
        });
    });
});
