let map;

function initMap(){
    map = new google.maps.Map(document.getElementById("map"),
        {
            center: { lat: 50.399286606996895, lng: -4.133991435644711},
            zoom: 12
        });
    getMarkers();
}

function getMarkers(){
    // Use JQuery selectors to dynamically work out what indexes lat and long should be at
    // in the table, meaning that the system will not break if the structure or order of the table changes
    let table = $("#data-table");
    let thead = table.children("thead");
    let latIndex = thead.find($("th:contains('Latitude')")).index();
    let lngIndex = thead.find($("th:contains('Longitude')")).index();

    let tableData = table.children("tbody").children();

    for (let i = 0; i < tableData.length; i++){
        let rowData = tableData[i].children;
        let latitude = parseFloat(rowData[latIndex].textContent);
        let longitude = parseFloat(rowData[lngIndex].textContent);
    }
}