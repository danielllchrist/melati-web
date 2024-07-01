console.log("halo")
document.addEventListener('DOMContentLoaded', function () {
    const menuLinks = document.querySelectorAll('.status-menu a');

    menuLinks.forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();

            // Hapus kelas active-menus dari semua menu
            menuLinks.forEach(item => {
                item.classList.remove('active-menus');
            });

            // Tambahkan kelas active-menus hanya pada menu yang diklik
            this.classList.add('active-menus');
        });
    });
});
