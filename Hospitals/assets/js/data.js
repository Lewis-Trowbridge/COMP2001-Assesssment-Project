let map;

function initMap(){
    map = new google.maps.Map(document.getElementById("map"),
        {
            center: { lat: 50.399286606996895, lng: -4.133991435644711},
            zoom: 12
        })
}