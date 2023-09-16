pimcore.registerNS("pimcore.plugin.CustomProductBundle");

pimcore.plugin.CustomProductBundle = Class.create({

    initialize: function () {
        document.addEventListener(pimcore.events.pimcoreReady, this.pimcoreReady.bind(this));
    },

    pimcoreReady: function (e) {
        // alert("CustomProductBundle ready!");
    }
});

var CustomProductBundlePlugin = new pimcore.plugin.CustomProductBundle();
