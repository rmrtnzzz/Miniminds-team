(function () {
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.auth-card a, .auth-back-btn').forEach(function (enlace) {
            enlace.addEventListener('click', function (e) {
                const href = enlace.getAttribute('href');
                if (!href || href.startsWith('#')) return;
                e.preventDefault();
                document.body.classList.add('auth-saliendo');
                setTimeout(function () {
                    window.location.href = href;
                }, 200);
            });
        });
    });
})();
