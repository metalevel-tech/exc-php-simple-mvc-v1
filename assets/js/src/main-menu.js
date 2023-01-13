/**
 * This is the SPA script for the main menu.
 * It replaces the content of <div id="body-content">,
 * without page reload.
 */

const nodes = {
    content: document.getElementById("body-content"),
    menu: document.getElementById("main-menu"),
    menuItems: document.querySelectorAll("a.main-menu-item"),
};

const bodyClasses = [];

function hrefToClass(element) {
    return element.getAttribute("href").replace(/^\/|\/$/g, "");
}

// Process single menu element
const changeMenuElementFunction = async (e) => {
    e.preventDefault();
    const item = e.currentTarget.parentNode.querySelector("a");
    // const item = e.target;

    if (item.classList.contains("selected-item")) {
        return;
    }

    try {
        // Fetch the page content
        const response = await fetch(`${item.href}?content`);
        if (!response.ok) throw new Error(`Network error: ${response}`);
        const html = await response.text();

        // Change the <div id="body-content"> content
        nodes.content.innerHTML = html;

        // Change the relevant body class
        let bodyClassList = [...document.body.classList];

        //  https://stackoverflow.com/a/33121880/6543935
        for (const bodyClass of [...new Set(bodyClasses)]) {
            bodyClassList = bodyClassList.filter(value => bodyClass != value);
        }

        bodyClassList.push(hrefToClass(item));
        document.body.className = bodyClassList.join(" ").replace(/index.php\s*/, "");

        // Find the "current active" menu item and remove the class
        nodes.menuItems.forEach((node) => {
            node.classList.remove("selected-item");
            if (node.href === item.href) {
                node.classList.add("selected-item");
            }
        });

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
    // console.log(item);
    bodyClasses.push(hrefToClass(item));
    item.addEventListener("click", changeMenuElementFunction);
});

// Handle the case when URI is index.php -> home
window.addEventListener("load", function () {
    setTimeout(function () {
        if ([...document.body.classList].indexOf("index.php") > -1) {
            // nodes.homeButton.click();
            document.body.classList.replace("index.php", "home");

            // Change the URI
            window.history.pushState("", "", "home");

            // detect the back/forward button navigation
            window.onpopstate = function (e) {
                if (e.state) {
                    nodes.content.innerHTML = e.state.html;
                    document.title = e.state.pageTitle;
                }
            };
        }

    }, 100);
});
