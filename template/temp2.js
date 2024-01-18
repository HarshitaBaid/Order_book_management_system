const links = document.querySelectorAll('.nav-link');
links.forEach(link => {
    link.addEventListener('click', () => {
        // Remove the 'active' class from all links
        links.forEach(l => l.classList.remove('activity-side'));

        // Add the 'active' class to the clicked link
        link.classList.add('activity-side');
});
});
