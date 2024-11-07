
    // JavaScript code to auto-hide footer on scroll
    let prevScrollPos = window.scrollY;

    window.addEventListener('scroll', function() {
        let currentScrollPos = window.scrollY;

        if (prevScrollPos > currentScrollPos) {
            // Scrolling up, show the footer
            document.getElementById('myFooter').classList.remove('hidden');
        } else {
            // Scrolling down, hide the footer
            document.getElementById('myFooter').classList.add('hidden');
        }

        prevScrollPos = currentScrollPos;
    });
