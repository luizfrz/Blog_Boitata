// Alterna entre claro e escuro e guarda a escolha.
const root = document.documentElement;

document.getElementById('theme-toggle')?.addEventListener('click', () => {
    const next = root.dataset.theme === 'dark' ? 'light' : 'dark';
    root.dataset.theme = next;
    try { localStorage.setItem('theme', next); } catch (_) {}
});
