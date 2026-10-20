// Alterna claro/escuro com um círculo que se expande a partir do botão.
// A animação em si está em resources/css/app.css (::view-transition-new).
const root = document.documentElement;
const reduceMotion = matchMedia('(prefers-reduced-motion: reduce)');

function setTheme(theme) {
    root.dataset.theme = theme;
    try { localStorage.setItem('theme', theme); } catch (_) {}
}

document.getElementById('theme-toggle')?.addEventListener('click', (event) => {
    const next = root.dataset.theme === 'dark' ? 'light' : 'dark';

    if (!document.startViewTransition || reduceMotion.matches) return setTheme(next);

    const { left, top, width, height } = event.currentTarget.getBoundingClientRect();
    const x = left + width / 2;
    const y = top + height / 2;

    root.style.setProperty('--x', `${x}px`);
    root.style.setProperty('--y', `${y}px`);
    root.style.setProperty('--r', `${Math.hypot(Math.max(x, innerWidth - x), Math.max(y, innerHeight - y))}px`);
    root.classList.add('theme-switching');

    document.startViewTransition(() => setTheme(next)).finished.finally(() =>
        root.classList.remove('theme-switching'),
    );
});
