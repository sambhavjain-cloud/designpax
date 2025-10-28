document.addEventListener("DOMContentLoaded", function () {
    const dropdownParents = document.querySelectorAll(".menu-item-has-children");

    dropdownParents.forEach(parent => {
        const toggleLink = parent.querySelector("a");
        const submenu = parent.querySelector(".sub-menu");

        if (toggleLink && submenu) {
            toggleLink.addEventListener("click", function (e) {
                e.preventDefault(); // prevent navigation
                parent.classList.toggle("dropdown-open");
            });
        }
    });
});




document.addEventListener('DOMContentLoaded', function () {
    const items = document.querySelectorAll('.service-item');

    items.forEach(item => {
        const toggle = item.querySelector('.service-toggle');
        const desc = item.querySelector('.service-description');

        toggle.addEventListener('click', function () {
            const isActive = item.classList.contains('active');

            // Close all other items
            items.forEach(other => {
                other.classList.remove('active');
                const otherDesc = other.querySelector('.service-description');
                if (otherDesc) otherDesc.style.display = 'none';
            });

            // Toggle current item
            if (!isActive) {
                item.classList.add('active');
                desc.style.display = 'block';
            }
        });
    });
});



document.querySelector('.open-contact-modal')?.addEventListener('click', () => {
  document.getElementById('contactModal').style.display = 'block';
});

document.querySelector('.close-contact-modal')?.addEventListener('click', () => {
  document.getElementById('contactModal').style.display = 'none';
});

window.addEventListener('click', (e) => {
  if (e.target === document.getElementById('contactModal')) {
    document.getElementById('contactModal').style.display = 'none';
  }
});


document.querySelectorAll('.open-contact-modal').forEach(el => {
  el.addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('contactModal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Lock background scroll
  });
});


document.addEventListener("DOMContentLoaded", function () {
    const videos = document.querySelectorAll("iframe.autoplay-on-scroll");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const iframe = entry.target;
                const src = iframe.getAttribute("src");
                if (!src.includes("autoplay=1")) {
                    const newSrc = src + (src.includes("?") ? "&" : "?") + "autoplay=1&mute=1";
                    iframe.setAttribute("src", newSrc);
                }
            }
        });
    }, {
        threshold: 0.5 // Trigger when 50% of video is visible
    });

    videos.forEach(video => observer.observe(video));
});


