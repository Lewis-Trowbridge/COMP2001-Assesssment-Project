let map;
let currentInfo;

function initMap(){
    map = new google.maps.Map(document.getElementById("map"),
        {
            center: { lat: 50.532026, lng: -4.434742},
            zoom: 10
        });
    getMarkers();
}

function getMarkers(){
    // Use JQuery selectors to dynamically work out what indexes name, lat and long should be at
    // in the table, meaning that the system will not break if the structure or order of the table changes
    let table = $("#data-table");
    let thead = table.children("thead");
    let nameIndex = thead.find($("th:contains('Name')")).index();
    let latIndex = thead.find($("th:contains('Latitude')")).index();
    let lngIndex = thead.find($("th:contains('Longitude')")).index();

    let tableData = table.children("tbody").children();

    for (let i = 0; i < tableData.length; i++){
        let rowData = tableData[i].children;
        let latitude = parseFloat(rowData[latIndex].textContent);
        let longitude = parseFloat(rowData[lngIndex].textContent);
        let latLong = { lat: latitude, lng: longitude};
        // Create marker at current practice's coordinates
        let marker = new google.maps.Marker({
            position: latLong,
            label: (i+1).toString(),
            map: map
        });
        // Create info window containing name of practice at
        let info = new google.maps.InfoWindow({
            content: rowData[nameIndex].textContent
        });
        // Add event listener to marker to open window when clicked
        marker.addListener("click",() => {
            try {
                currentInfo.close();
            }
            // If no marker has been set, trying to close it will throw an error, but the rest of the
            // process should be completed anyway
            catch (error){

            }
            info.open(map, marker);
            // Move map center to this marker
            map.panTo(marker.getPosition());
            currentInfo = info;
        })
    }
}