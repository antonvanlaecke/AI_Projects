document.addEventListener('DOMContentLoaded', () => {
    const html = document.documentElement;
    const themeSwitcher = document.getElementById('theme-switcher');
    if (!themeSwitcher) return;

    const prefersDarkQuery = window.matchMedia('(prefers-color-scheme: dark)');

    const applyTheme = (theme) => {
        html.setAttribute('data-theme', theme);
        const isDark = theme === 'dark';
        themeSwitcher.setAttribute('aria-pressed', String(isDark));
        themeSwitcher.querySelector('.theme-switcher__icon').textContent = isDark ? '🌞' : '🌙';
        themeSwitcher.querySelector('.theme-switcher__label').textContent = isDark ? 'Light mode' : 'Dark mode';
    };

    const getSystemTheme = () => (prefersDarkQuery.matches ? 'dark' : 'light');

    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        applyTheme(savedTheme);
    } else {
        applyTheme(getSystemTheme());
    }

    themeSwitcher.addEventListener('click', () => {
        const nextTheme = html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        applyTheme(nextTheme);
        localStorage.setItem('theme', nextTheme);
    });

    if (prefersDarkQuery.addEventListener) {
        prefersDarkQuery.addEventListener('change', (event) => {
            if (!localStorage.getItem('theme')) {
                applyTheme(event.matches ? 'dark' : 'light');
            }
        });
    } else if (prefersDarkQuery.addListener) {
        prefersDarkQuery.addListener((event) => {
            if (!localStorage.getItem('theme')) {
                applyTheme(event.matches ? 'dark' : 'light');
            }
        });
    }
});
