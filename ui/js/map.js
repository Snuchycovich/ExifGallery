$(document).ready(function(){
    if ($("#map").length){
        $.getJSON("./images.json", function(images){
            for(i = 0; i < images.length; i++){
                 imageName = JSON.parse(images[i]).filename;

                $.getJSON("./data/" + imageName+ ".json", function(imageJson){
                    
                    if(imageJson[0]){
                        var name = imageJson[0]['File'].FileName;
                        var creator = imageJson[0]['XMP'].Creator;
                        var rights = imageJson[0]['XMP'].Rights
                        var headline = imageJson[0]['XMP'].Title;
                        var RefGPSLatitude = imageJson[0]['EXIF'].GPSLatitudeRef;
                        var GPSLatitude = imageJson[0]['EXIF'].GPSLatitude;
                        var RefGPSLongitude = imageJson[0]['EXIF'].GPSLongitudeRef
                        var GPSLongitude = imageJson[0]['EXIF'].GPSLongitude;
                        var latitude = getGpsDecimal(GPSLatitude, RefGPSLatitude);
                        var longitude = getGpsDecimal(GPSLongitude, RefGPSLongitude);
            
                        var photoIcon = L.icon({
                            iconUrl: './uploads/'+name,
                            iconSize:     [45, 37], // size of the icon
                            popupAnchor:  [45, 37] // point from which the popup should open relative to the iconAnchor
                        });
                        var marker = L.marker([latitude, longitude], {icon:photoIcon}).addTo(map);
                        marker.on("click", function(e){
                            lightbox('<div id="close-icone"/><img src="./uploads/'+name+'" alt="'+headline+'" width="464" class="imgLB"/>'
                                +'<span class="headline">'+headline+'</span><br><span class="creator">Creator: '+creator+'</span> - <span class="rights">Rights: '+rights+'</span>');
                        });

                    }

                });

            }

        });
    
    var map = L.map('map').setView([30, -5], 2);

    L.tileLayer('https://api.tiles.mapbox.com/v4/mapbox.streets/{z}/{x}/{y}.png?access_token=pk.eyJ1Ijoic251Y2h5Y292aWNoIiwiYSI6ImNpZ3pxN2p2ZTAwaXR1eG03OGt4dGw1eXMifQ.yQa6IvhYNfBOBwLdkPAHng', {
       attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://mapbox.com">Mapbox</a>',
        maxZoom: 18,
        id: 'your.mapbox.project.id',
        accessToken: 'your.mapbox.public.access.token'
    }).addTo(map);
    
    }

});

function getGpsDecimal(cordonnee, ref){
    var cordTab = cordonnee.split(" ");
    var degree = cordTab[0];
    //console.log(degree);
    var min = cordTab[2].replace("'", '');
    var sec = cordTab[3].replace('"', '');

    var result = "";
    if (ref == "West" || ref == "South"){
        result = "-";
    }
    result += parseInt(degree) + (((min/60)+sec/3600));
    return result;
}







