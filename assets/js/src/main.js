(() => {
    console.log('JS test log.');
    try {
        if ($('body').length) console.log('jQuery is active.');
    }
    catch(error) {
        console.log('jQuery is not enabled.');
    }
})();
