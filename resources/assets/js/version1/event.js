var Event = function (url, validateMessage) {
    this.url = url;
    this.validateMessage = validateMessage;
};

Event.prototype = {
    init: function () {
        var _self = this;
        _self.setDatepicker();
        _self.getGoogleAddress();
        _self.uploadPreview();
        _self.ckeditor();
        _self.validate();

    },

    setDatepicker: function () {
        $('.datetimepicker').bootstrapMaterialDatePicker({ weekStart : 0, time: false, format : 'YYYY/MM/DD'}  );
    },

    getGoogleAddress: function () {
        if (document.getElementById('location') != null) {
            google.maps.event.addDomListener(window, 'load', function () {
                var places = new google.maps.places.Autocomplete(document.getElementById('location'));
                google.maps.event.addListener(places, 'place_changed', function () {
                    document.getElementById('lat').value = places.getPlace().geometry.location.lat();
                    document.getElementById('lng').value = places.getPlace().geometry.location.lng();
                });
            });
        }
    },

    uploadPreview: function () {
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview"
        });
    },

    ckeditor: function () {
        var _self = this;
        CKEDITOR.replace( 'editor', {
            filebrowserUploadUrl: _self.url
        });
    },

    validate: function () {
        var _self = this;
        var message = JSON.parse(_self.validateMessage);

        $('#create-event').validate({
            rules: {
                campaign_id: {
                    required: true
                },
                image: {
                    required: true
                },
                name: {
                    required: true,
                    minlength: 10
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                address: {
                    required: true
                },
                content: {
                    required: true
                },
                description: {
                    required: true
                }
            },
            messages: {
                campaign_id: {
                    required: message.campaign_id.required
                },
                image: {
                    required: message.image.required
                },
                name: {
                    required: message.name.required,
                    minlength: message.name.minlength
                },
                start_date: {
                    required: message.start_date.required
                },
                end_date: {
                    required: message.end_date.required
                },
                address: {
                    required: message.location.required
                },
                content: {
                    required: message.content.required
                },
                description: {
                    required: message.description.required
                }
            }
        });
    }
};
