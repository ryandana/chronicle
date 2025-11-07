export function initNavbar() {
    const menuToggle = document.getElementById("menu-toggle");
    const closeMenu = document.getElementById("close-menu");
    const mobileMenu = document.getElementById("mobile-menu");
    const navbar = document.getElementById("navbar");

    if (!menuToggle || !closeMenu || !mobileMenu || !navbar) return;

    let lastScrollY = window.scrollY;

    // Open mobile menu
    menuToggle.addEventListener("click", () => {
        mobileMenu.classList.remove("opacity-0", "invisible", "scale-95");
        mobileMenu.classList.add("opacity-100", "visible", "scale-100");
        document.body.style.overflow = "hidden";
    });

    // Close mobile menu
    const closeMobileMenu = () => {
        mobileMenu.classList.add("opacity-0", "invisible", "scale-95");
        mobileMenu.classList.remove("opacity-100", "visible", "scale-100");
        document.body.style.overflow = "";
    };

    closeMenu.addEventListener("click", closeMobileMenu);

    mobileMenu.querySelectorAll("a").forEach((link) => {
        link.addEventListener("click", closeMobileMenu);
    });

    // Navbar scroll hide/show
    window.addEventListener("scroll", () => {
        const currentScroll = window.scrollY;

        if (currentScroll > lastScrollY && currentScroll > 80) {
            navbar.classList.add("-translate-y-full");
        } else {
            navbar.classList.remove("-translate-y-full");
        }

        lastScrollY = currentScroll;
    });

    // Escape key closes menu
    document.addEventListener("keydown", (e) => {
        if (
            e.key === "Escape" &&
            mobileMenu.classList.contains("opacity-100")
        ) {
            closeMobileMenu();
        }
    });
}

document.addEventListener("DOMContentLoaded", initNavbar);
document.addEventListener("livewire:navigated", initNavbar);
