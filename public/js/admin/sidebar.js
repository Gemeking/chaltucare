    // Function to handle sidebar link clicks
    function handleSidebarLinkClick(url) {
        // Load content
        loadContent(url);

        // Close the offcanvas sidebar
        const sidebar = document.getElementById('sidebar');
        const offcanvas = bootstrap.Offcanvas.getInstance(sidebar);
        offcanvas.hide();
    }

    // Function to load content dynamically
    function loadContent(url) {
        // Replace this with your actual content loading logic
        console.log(`Loading content from: ${url}`);
        // Example: Fetch content via AJAX and update the main content area
        // $.ajax({
        //     url: url,
        //     type: "GET",
        //     success: function (data) {
        //         $('#dashboard-content').html(data);
        //     },
        //     error: function () {
        //         alert("Failed to load content.");
        //     }
        // });
    }