$('.change_image').change(function() {
    var data = $(this).data('img')
    document.getElementById(data).src = window.URL.createObjectURL(this.files[0])
})
