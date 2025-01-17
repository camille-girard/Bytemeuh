document.addEventListener('DOMContentLoaded', function() {
    var openMenu = document.getElementById('open-menu');
    var mainMenu = document.getElementById('main-menu');
    var closeMenuButton = mainMenu.querySelector('.close-menu-button');
    var menuIcon = document.getElementById('menu-icon');
    var header = document.getElementById('main-header');
    var main = document.getElementById('main-content');
    var siteLogo = document.getElementById('site-logo');
    var is404Page = document.body.classList.contains('error-404');

    var menuOpenSVG = esgiIcons.menuOpen;
    var menuCloseSVG = esgiIcons.menuClose;
    var logoSVG = '<a href="/">' + esgiIcons.logo + '</a>';
    var originalLogo = '<a href="/">' + esgiIcons.originalLogo + '</a>';
    var menuOpenWhiteSVG = esgiIcons.menuOpenWhite;

    function toggleMenu() {
        console.log('toggleMenu called');
        if (mainMenu.classList.contains('active')) {
            mainMenu.classList.remove('active');
            header.classList.remove('header-global');
            main.style.marginTop = '0rem';
            console.log('Menu hidden');
            menuIcon.innerHTML = is404Page ? menuOpenWhiteSVG : menuOpenSVG;
            if (!is404Page) {
                header.style.backgroundColor = '';
                siteLogo.innerHTML = originalLogo;
            }
        } else {
            mainMenu.classList.add('active');
            header.classList.add('header-global')
            main.style.marginTop = '12.3rem';
            console.log('Menu shown');
            menuIcon.innerHTML = menuCloseSVG;
            header.style.backgroundColor = 'rgba(5, 10, 58, 1)';
            if (!is404Page) {
                siteLogo.innerHTML = logoSVG;
            }
        }
    }

    openMenu.onclick = toggleMenu;
    if (closeMenuButton) {
        closeMenuButton.onclick = toggleMenu;
    }

    var menuLinks = mainMenu.querySelectorAll('a');
    menuLinks.forEach(function(link) {
        link.addEventListener('click', function () {
            // Close the menu
            if (mainMenu.classList.contains('active')) {
                toggleMenu();
            }
        });
    });
});



// js/customizer.js

(function( $ ) {
    wp.customize( 'sidebar_bg_color', function( value ) {
        value.bind( function( newval ) {
            $( '#secondary' ).css( 'background-color', newval );
        } );
    } );
    wp.customize( 'sidebar_text_color', function( value ) {
        value.bind( function( newval ) {
            $( '#secondary' ).css( 'color', newval );
        } );
    } );
})( jQuery );
