/**
 * Created by lahbib on 27/11/2015.
 */


    $(document).ready(function(){

        $("#input-file").fileinput({
            previewFileType: "image",
            browseClass: "btn btn-default",
            browseLabel: "",
            browseIcon: "<i class=\"glyphicon glyphicon-picture\"></i> ",
            removeClass: "btn btn-default",
            removeLabel: "",
            removeIcon: "<i class=\"glyphicon glyphicon-trash\"></i> ",
            cancelClass: "btn btn-default",
            cancelLabel: "",
            uploadClass: "btn btn-default",
            uploadLabel: "",
            uploadUrl: "src/Aen/ExifGallery/Image/uploder.php",
            uploadAsync: false,
            overwriteInitial: true

        });
        $("#filtres").select2({maximumSelectionLength: 2});
        $('#bFlicker').click(function(){
                var keywords=$("#filtres>option:selected").map(function(){
                    return $(this).val();
                }).get();
                if(keywords.length==0) {
                    keywords = $("#filtres>option").map(function () {
                        return $(this).val();
                    }).get();
                    $("#"+keywords[0]).prop('selected', true);
                    $("#"+keywords[0]).select();
                    keywords=[keywords[0]];
                }
                $.ajax({
                    type: 'POST',
                    url: 'src/Aen/Library/Flickr/flickrSearch.php',
                    data: {"q" : keywords},
                    success: function(data) {
                        $("#flicker").html(data);
                    },
                    error:function(err){
                        console.log(err);
                    }
                });
            });

        $( ".collapse-content" ).children().find("input[type=radio]").change(function() {
            current = $(this).parent().closest('div[id]').get(0).id;
            //$("#"+current+" .prop").removeClass('hidden');
            //alert(current=='date')
            if ($(this).val() == 'XMP') {
                if(current=='date') {
                    str = $('#' + current + ' [name="xmp-date"]').val().split(" ");
                    date = str[0].split(":");
                    $('#' + current + ' [name=prop-y]').val(date[0]);
                    $('#' + current + ' [name=prop-m]').val(date[1]);
                    $('#' + current + ' [name=prop-d]').val(date[2]);
                }else
                    $('#'+current+' [name=prop-'+current+']').val($('#'+current+' [name^="xmp-"]').val());
            } else if ($(this).val() == 'EXIF') {
                if(current=='date') {
                    str = $('#' + current + ' [name="exif-date"]').val();
                    date = str.split(" ")[0].split(":");
                    $('#' + current + ' [name=prop-y]').val(date[0]);
                    $('#' + current + ' [name=prop-m]').val(date[1]);
                    $('#' + current + ' [name=prop-d]').val(date[2]);
                }else
                    $('#'+current+' [name=prop-'+current+']').val($('#'+current+' [name^="exif-"]').val());
            } else if ($(this).val() == 'IPTC') {
                if(current=='date') {
                    str = $('#' + current + ' [name="iptc-date"]').val();
                    date = str.split(" ")[0].split(":");
                    $('#' + current + ' [name=prop-y]').val(date[0]);
                    $('#' + current + ' [name=prop-m]').val(date[1]);
                    $('#' + current + ' [name=prop-d]').val(date[2]);
                }else
                    $('#'+current+' [name=prop-'+current+']').val($('#'+current+' [name^="iptc-"]').val());
            }
        });

        /*$( ".collapse-content" ).children().find('input[type=text], textarea').keyup(function() {
            current = $(this).parent().closest('div[id]').get(0).id;
            $('#'+current+' [name^="iptc-"]').val($(this).val());
            $('#'+current+' [name^="xmp-"]').val($(this).val());
            $('#'+current+' [name^="exif-"]').val($(this).val());
        });

        $( ".collapse-content" ).children().find('input[type=text], textarea').change(function() {
            current = $(this).parent().closest('div[id]').get(0).id;
            $('#'+current+' [name^="iptc-"]').val($(this).val());
            $('#'+current+' [name^="xmp-"]').val($(this).val());
            $('#'+current+' [name^="exif-"]').val($(this).val());
        });*/

    });