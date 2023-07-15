import $ from "jquery";

$(() => {
    // Hookup listeners for the main menu mobile bar.
    $('.menu-button-wrapper').on("click", () => {
        const $mainMenuContainer = $('#main-menu-container');
        const duration = 200;
        if ($mainMenuContainer.is(':visible')) {
            $mainMenuContainer.hide(duration);
        } else {
            $mainMenuContainer.show(duration);
        }
    });
});