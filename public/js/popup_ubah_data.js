document.addEventListener('DOMContentLoaded', function() {
    const navLinks = document.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('.form-section, .profile');
    const dataPesertaSection = document.getElementById('data-peserta');
    const alamatSection = document.getElementById('alamat');
    const editDataLink = document.getElementById('edit-data-link');
    const editAlamatLink = document.getElementById('edit-alamat-link');
    const editDataPopup = document.getElementById('edit-data-popup');
    const editAlamatPopup = document.getElementById('edit-alamat-popup');
    const closeBtns = document.querySelectorAll('.close-btn');

    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');

            if (link.dataset.target === 'data-peserta') {
                dataPesertaSection.style.display = 'block';
            } else {
                dataPesertaSection.style.display = 'none';
            }

            if (link.dataset.target === 'alamat') {
                alamatSection.style.display = 'block';
            } else {
                alamatSection.style.display = 'none';
            }

            sections.forEach(section => {
                if (section.id === link.dataset.target) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });
    });

    // Tampilkan popup saat tombol "Ubah" di klik
    editDataLink.addEventListener('click', (e) => {
        e.preventDefault();
        editDataPopup.style.display = 'block';
    });

    editAlamatLink.addEventListener('click', (e) => {
        e.preventDefault();
        editAlamatPopup.style.display = 'block';
    });

    // Sembunyikan popup saat tombol "Tutup" di klik
    closeBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            btn.closest('.popup').style.display = 'none';
        });
    });

    // Set initial section display
    sections.forEach(section => {
        section.style.display = 'none';
    });
    dataPesertaSection.style.display = 'block';
});
