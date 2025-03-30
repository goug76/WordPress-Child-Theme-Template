const $ = window.jQuery;

export default class KeyboardShortcuts {
    constructor() {
        this.events();
    }

    events() {
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
    }

    keyPressDispatcher(e) {
        // Check for Ctrl + Alt + Home (KeyCode 36)
        if (e.ctrlKey && e.altKey && e.keyCode === 36) {
            e.preventDefault(); // Prevent default behavior

            let urlObj = new URL(window.location.href);
            let cleanBaseURL = `${urlObj.protocol}//${urlObj.hostname}`; // Removes port

            // If on frontend, go to the WordPress admin page
            window.location.href = `${cleanBaseURL}/wp-admin`;
        }
    }
}