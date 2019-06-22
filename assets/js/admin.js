window.addEventListener("load", function() {

    var tabs = document.querySelectorAll("ul.nav-tabs > li");
    for (i = 0; i < tabs.length; i++) {
        tabs[i].addEventListener("click", switchTab);
    }

    function switchTab(event) {
        event.preventDefault();

        removeClass('ul.nav-tabs li.active', 'active');
        removeClass('.tab.active', 'active');

        var activeTab = event.currentTarget;
        var activeContentTab = event.target.getAttribute('href');



        activeTab.classList.add('active');
        document.querySelector(activeContentTab).classList.add('active');

    }

    function removeClass(query, cls) {
        document.querySelector(query).classList.remove(cls);
    }

});