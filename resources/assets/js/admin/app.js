import Vue from 'vue/dist/vue';

window.Vue = Vue;

Vue.component('gallery', require('./components/gallery.vue').default);


$(function () {
    let type_auction = $('#type_auction');
    let type_online = $('#type_online');
    let type_car = $('#type_car');
    let type = $('#type');
    type_auction.on('change', function() {
        $('#type').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "auction/create") {
        let type_auc = $("#type_auction option:first").val();
        console.log(type_auc);
        $("#type_auction").val(type_auc);
        $('#type').val(type_auc);
    }
    type_auction.val(type.val());

    type_car.on('change', function() {
        $('#type').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "cars/create") {
        let type_auc = $("#type_car option:first").val();
        console.log(type_auc);
        $("#type_car").val(type_auc);
        $('#type').val(type_auc);
    }
    type_car.val(type.val());

    type_online.on('change', function() {
        $('#type').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "online/create") {
        let type_onl = $("#type_online option:first").val();
        console.log(type_onl);
        $("#type_online").val(type_onl);
        $('#type').val(type_onl);
    }
    type_online.val(type.val());

    let port_select = $('#port_select');
    let city_select = $('#city_select');
    let type_select = $('#type_select');
    let port_id = $('#port_id');
    let city_id = $('#city_id');
    let type_id = $('#type_id');
    port_select.on('change', function() {
        $('#port_id').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "prices/create") {
        let type_port = $("#port_select option:first").val();
        console.log(type_port);
        port_select.val(type_port);
        port_id.val(type_port);
    }
    port_id.val(port_id.val());
    $(`#port_select option[value=${port_id.val()}]`).attr('selected','selected');

    city_select.on('change', function() {
        $('#city_id').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "prices/create") {
        let type_city = $("#city_select option:first").val();
        console.log(type_city);
        port_select.val(type_city);
        city_id.val(type_city);
    }
    city_id.val(city_id.val());
    $(`#city_select option[value=${city_id.val()}]`).attr('selected','selected');

    type_select.on('change', function() {
        $('#type_id').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "prices/create") {
        let type_type = $("#type_select option:first").val();
        console.log(type_type);
        type_select.val(type_type);
        type_id.val(type_type);
    }
    type_id.val(type_id.val());
    $(`#type_select option[value=${type_id.val()}]`).attr('selected','selected');

    let type2_select = $('#type2_select');
    let type2 = $('#type2');
    type2_select.on('change', function() {
        $('#type2').val(this.value);
    });
    if (window.location.href.split('/').slice(-2).join("/") === "port_froms/create") {
        let type_type2 = $("#type2_select option:first").val();
        console.log(type_type2);
        type2_select.val(type_type2);
        type2.val(type_type2);
    }
    type2.val(type2.val());
    $(`#type2_select option[value=${type2.val()}]`).attr('selected','selected');

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

