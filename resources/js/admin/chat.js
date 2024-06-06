// Mengambil semua tombol customer
const customerButtons = document.querySelectorAll(".nostyle");

// Menambahkan event listener untuk setiap tombol customer
customerButtons.forEach((button) => {
    button.addEventListener("click", function () {
        // Menghapus class 'selected' dari semua tombol customer
        customerButtons.forEach((btn) => {
            btn.classList.remove("selected");
        });
        // Menambahkan class 'selected' ke tombol customer yang diklik
        this.classList.add("selected");
    });
});
