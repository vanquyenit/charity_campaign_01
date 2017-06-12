var Blog = function (validateMessage) {
    this.validateMessage = validateMessage;
};

Blog.prototype = {
    init: function () {
        var _self = this;
        _self.uploadPreview();
        _self.validate();
        _self.category();

    },

    category: function () {
        $(document).on('change', '#type_blog', function(){

            var type = $('#type_blog').val();
            var image_preview = $('.image_preview');
            var video_preview = $('.video_preview');

            if (type == 'video') {
                image_preview.hide();
                video_preview.fadeIn(3000);
            } else {
                video_preview.hide();
                image_preview.fadeIn(3000);
            }
        })
    },

    uploadPreview: function () {
        $("#image__preview").bind('change', handleFileSelect);
        function handleFileSelect(evt) {
            var files = evt.target.files;
            document.getElementById('img-previews').innerHTML = '';
            for (var i = 0, f; f = files[i]; i++) {
                if (!f.type.match('image.*')) {
                    continue;
                }
                $('.img-preview-wrapper').removeClass('hidden');
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (e) {
                        var span = document.createElement('span');
                        span.innerHTML = ['<img class="col-xs-3" src="', e.target.result,
                        '" title="', escape(theFile.name), '"/>'].join('');
                        document.getElementById('img-previews').insertBefore(span, null);
                    };
                })(f);
                reader.readAsDataURL(f);
            }
        }
    },

    validate: function () {
        var _self = this;
        var message = JSON.parse(_self.validateMessage);
        $.validator.addMethod("links", function(value, element) {
            var match = value.match(/(?:https?:\/\/)?(?:youtu\.be\/|(?:www\.)?youtube\.com\/watch(?:\.php)?\?.*v=)([a-zA-Z0-9\-_]+)/);

            if(match != null) {
                return  true;
            }
        }, message.video.required);
        $('#create-blog').validate({
            rules: {
                'img[]': {
                    required: true
                },
                title: {
                    required: true,
                    minlength: 10
                },
                video: {
                    required: true,
                    links: true
                }
            },
            messages: {
                'img[]': {
                    required: message.image.required
                },
                title: {
                    required: message.title.required,
                    minlength: message.title.minlength
                },
                video: {
                    required: message.video.required
                }
            }
        });
    }
};
