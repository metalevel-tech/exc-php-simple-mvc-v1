/**
 * This is the AJAX script for the main menu.
 * It replaces the content of <div id="body-content">,
 * without page reload.
 */

const nodes = {
    content: document.getElementById("body-content"),
    menu: document.getElementById("main-menu"),
    menuItems: document.querySelectorAll("li.menu-item > a"),
};

const bodyClasses = [];

function hrefToClass(element) {
    return element.getAttribute("href").replace(/^\/|\/$/g, '')
}

// Process single menu element
const changeMenuElementFunction = async (e) => {
    e.preventDefault();
    const item = e.currentTarget;

    try {
        // Fetch the page content
        const response = await fetch(`${item.href}?content`);
        if (!response.ok) throw new Error(`Network error: ${response}`);
        const html = await response.text();

        // Change the <div id="body-content"> content
        nodes.content.innerHTML = html;

        // Change the relevant body class
        let currentBodyClasses = [...document.body.classList];
        for (const bodyClass of bodyClasses) {
            currentBodyClasses = currentBodyClasses.filter(value => bodyClass != value);
        }
        currentBodyClasses.push(hrefToClass(item));
        document.body.classList = currentBodyClasses;
       
        // Change the URI
        window.history.pushState({
            "html": html,
            "pageTitle": document.title
        }, "", item.href);

        // detect the back/forward button navigation
        window.onpopstate = function (e) {
            if (e.state) {
                nodes.content.innerHTML = e.state.html;
                document.title = e.state.pageTitle;
            }
        };
    }
    catch (error) {
        console.error(`Error in the main menu function: ${error.message}`);
    }
}

// Process the menu elements
nodes.menuItems.forEach(item => {
    bodyClasses.push(hrefToClass(item));
    item.addEventListener("click", changeMenuElementFunction);
});
