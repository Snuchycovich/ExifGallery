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
            uploadClass: "btn btn-default",
            uploadLabel: "",
            uploadUrl: "src/Aen/ExifGallery/Image/uploder.php",
            uploadAsync: false,
            overwriteInitial: true

        });


        $(".clickedimage").click(function(img){
            var src = $(img.target).closest('.clickedimage').children('img')[0].src.split("/");
            var image = src[src.length-1];
            $.ajax({
                type: 'POST',
                url: 'app/View/imageDetails.php',
                data: {"url" : image},
                success: function(data) {
                    $("#details").html(data);
                    $(".close").click(function(img){
                        $("#details").removeClass("open");
                    });
                    $("#filtres").select2({maximumSelectionLength: 2});
                    $('#bFlicker').click(function(){
                        $("#details").append($.parseHTML('<nav class="nav-wrapper visible-xs nav-wrapper-mobile">'+
                            '<div class="nav-wrapper-mobile-inner">'+
                            '<div class="nav-wrapper-mobile-vertical-center">'+
                            '</div></div></nav>'));
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
                            url: 'app/View/flickerSearch.php',
                            data: {"q" : keywords},
                            success: function(data) {
                                $("#metadata").addClass("col-xs-7");
                                $("#metadata").removeClass("col-xs-8");
                                $("#flicker").removeClass("col-xs-2");
                                $("#flicker").addClass("col-xs-5");
                                $("#flicker").html(data);
                            },
                            error:function(err){
                                alert("err");
                            }
                        });
                    });
                }
            });
        });

    });