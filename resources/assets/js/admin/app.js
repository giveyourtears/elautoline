import Vue from 'vue/dist/vue';

window.Vue = Vue;

Vue.component('gallery', require('./components/gallery.vue').default);


$(function () {
    ImageUploadConfigurator.init();
    $('#sidebar [data-toggle="tooltip"]').tooltip('disable');
    $('.sidebar-collapse').on('click', function () {
        $('#sidebar,#content').toggleClass('active');
        $('#sidebar [data-toggle="tooltip"]').tooltip('toggleEnabled')
    });

    $(".confirm-button").on("click", function () {
        $("#delete-item").attr("href", $(this).attr("data-value"));
    });

    $("#search-single").keypress(function (e) {
        if (e.which == 13) {
            Filter.search();
        }
    });

    $("#btn-search").on("click", function () {
        Filter.search();
    });

    $(".checkbox-modern").on("click", function () {
        if ($(this).is(":checked")) {
            $(this).val(1);
        } else {
            $(this).val(0);
        }
    });


});

var Filter = {
    search: function () {
        var url = $("#search-single").attr("data-url") + "?q=" + encodeURIComponent($("#search-single").val());
        $(location).attr('href', url);
    }
}

var ImageUploadConfigurator = {
    init: function(){
        $('.image-preview').css('background-image', function() {
            return 'url(' + $(this).attr('data-init-image') + ')';
        });

        $('.btn-image-upload').click(function() {
            let input = $(this).parents('.image-edit').find('.image-upload');
            input.trigger('click');
        });

        $('.download-image-qrcode').click(function() {
            svgToPngDownload();
        });

        $(".image-upload").change(function () {
            let input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    let imagePreview = $(input).parents('.image-upload-container').find('.image-preview');
                    imagePreview.css('background-image', 'url(' + e.target.result + ')');
                    // imagePreview.hide();
                    imagePreview.fadeIn(650);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    }
};

