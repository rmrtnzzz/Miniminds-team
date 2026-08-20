(function () {
    const body = document.body;
    const base = body.dataset.panelThemeBase || 'light'; // 'light' (paciente/especialista) o 'dark' (admin)
    const altClass = base === 'dark' ? 'light' : 'dark';

    function apply(theme) {
        if (theme === altClass) {
            body.classList.add(altClass);
        } else {
            body.classList.remove(altClass);
        }
    }

    const saved = localStorage.getItem('theme');
    if (saved) apply(saved);

    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('theme-toggle-btn');
        if (!btn) return;

        btn.addEventListener('click', function () {
            const isAlt = body.classList.toggle(altClass);
            const theme = isAlt ? altClass : base;
            localStorage.setItem('theme', theme);
        });
    });
})();
