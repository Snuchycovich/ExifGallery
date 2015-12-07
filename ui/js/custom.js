$(document).ready(function(){
    

    if ($('.error').text() == '') {
        $('.error').css({'display':'none', 'visibility':'hidden'})
    }
    if ($('.mainTitre').text() == 'Article') {
        $('.mainTitre').css({'display':'none', 'visibility':'hidden'})
    }
    $('header #newArticle').hide();
    $('#submitBtn').hide();
    $('#btnHautFlickr').hide();
    // colorbox
    $('.imageArticle').colorbox({rel:'imageArticle', transition : 'fade'});
    // images
    $('#imgFormBtn').on('click', search);
    $('#imgForm').submit(function(e){
        console.log('before send')
        var self = this;
        e.preventDefault();

        $('.selected').each(function(i, item) {
            console.log(item);
            var img = $(item).attr('img');
            var title = $(item).attr('alt');
            var hiddenImg = "<input type=\"hidden\" name=\"chemin\" value=\""+img+"\">";
            var hiddenTitle = "<input type=\"hidden\" name=\"titre\" value=\""+title+"\">";
            $(hiddenImg).appendTo('#imgForm');
            $(hiddenTitle).appendTo('#imgForm');
        });
        if ($('.selected').length){
            self.submit();
        } else {
            var error = "<div class=\"error\">Sélectionez une image</div>"
            $(error).appendTo('#imgForm .form');
        }
        
    });
});
    var search = function(ev) {
            ev.stopPropagation();
            ev.preventDefault();
            var urlflickr = "https://api.flickr.com/services/rest/";
            //?method=flickr.photos.search&api_key=bc259483c2f8754ab3272844353c6f9c&tags=caen&license=2&format=json
            var params = {
                'method' : 'flickr.photos.search',
                'api_key' :  'b404d2b561ef013e74a1680c3d162964',
                'tags' : $('#tags').val(),
                'license' : '2',
                'format' : 'json',
                };
            $.ajax({url: urlflickr, dataType: "jsonp", jsonp: "jsoncallback", data:params}).done(parseFlickr);
        }
    
    function parseFlickr(response) {
        console.log("C'est un succès !");
        console.log(response);
        $.each(response.photos.photo, function(i, item){
            var img = new Image();
            img.src = "https://farm"+item.farm+".staticflickr.com/"+item.server+"/"+item.id+"_"+item.secret+"_q.jpg";
            img.alt = item.title;
            img.id = item.id;
            $(img).addClass('imageFlickr');
            $(img).attr('img', "https://farm"+item.farm+".staticflickr.com/"+item.server+"/"+item.id+"_"+item.secret+"_b.jpg");
            $('#flickrContainer').append(img);
            $('#submitBtn').show();
            $('#btnHautFlickr').show();
        });
        $('img.imageFlickr').click(function(){
            if ($('.selected').length){
                $('img.imageFlickr').removeClass('selected');
            }
            $(this).toggleClass("selected");
            $('.error').hide();
        });
    }
//Location événements
function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        }
    }

function showPosition(position) {
    var url = "index.php?t=event&a=local&lat=" + position.coords.latitude
    + "&long=" + position.coords.longitude;
    console.log(url);
    window.location.assign(url);
}