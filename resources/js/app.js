require("./bootstrap");

document
    .getElementById("searchForm")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        var searchQuery = document.getElementById("searchInput").value;
        console.log("Search query: " + searchQuery);
    });

document
    .getElementById("searchInput")
    .addEventListener("keydown", function (event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("searchForm").submit();
        }
    });
