const search = document.querySelector('#cari-layanan');

if (search) {
    const services = [...document.querySelectorAll('.service')];
    const emptyMessage = document.querySelector('#tidak-ditemukan');

    search.addEventListener('input', () => {
        const query = search.value.trim().toLocaleLowerCase('id');
        let visibleCount = 0;

        services.forEach((service) => {
            const matches = service.textContent.toLocaleLowerCase('id').includes(query);
            service.hidden = !matches;
            if (matches) visibleCount += 1;
        });

        emptyMessage.hidden = visibleCount > 0;
    });
}

document.querySelectorAll('[data-year-select]').forEach((select) => {
    select.addEventListener('change', () => {
        const groups = document.querySelectorAll(`[data-year-group="${select.dataset.yearSelect}"]`);
        groups.forEach((group) => {
            group.hidden = group.dataset.year !== select.value;
        });
    });
});

const ticketForm = document.querySelector('#ticket-form');

if (ticketForm) {
    ticketForm.addEventListener('submit', (event) => {
        event.preventDefault();
        const ticketCode = document.querySelector('#ticket-code').value.trim().toUpperCase();
        const result = document.querySelector('#ticket-result');

        result.textContent = ticketCode === 'CPT-2026-001'
            ? 'Contoh CPT-2026-001: Perbaikan Saluran Drainase RT 03, status diproses. Ini bukan laporan sungguhan.'
            : 'Kode contoh tidak ditemukan. Coba CPT-2026-001.';
    });
}
