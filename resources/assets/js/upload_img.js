function ekUpload() {
    function Init() {
        console.log("Upload Initialised");
        var fileSelect = document.getElementById('file-upload'),
            fileDrag = document.getElementById('file-drag'),
            submitButton = document.getElementById('submit-button');
        fileSelect.addEventListener('change', fileSelectHandler, false);
        var xhr = new XMLHttpRequest();

        if (xhr.upload) {
            fileDrag.addEventListener('dragover', fileDragHover, false);
            fileDrag.addEventListener('dragleave', fileDragHover, false);
            fileDrag.addEventListener('drop', fileSelectHandler, false);
        }
    }

    function fileDragHover(e) {
        var fileDrag = document.getElementById('file-drag');
        e.stopPropagation();
        e.preventDefault();
        fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
    }

    function fileSelectHandler(e) {
        var files = e.target.files || e.dataTransfer.files;
        fileDragHover(e);
        for (var i = 0, f; f = files[i]; i++) {
            parseFile(f);
            uploadFile(f);
        }
    }

    function output(msg) {
        var m = document.getElementById('messages');
        m.innerHTML = msg;
    }

    function parseFile(file) {
        console.log(file.name);
        var imageName = file.name;
        var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);

        if (isGood) {
            document.getElementById('start').classList.add("hidden");
            document.getElementById('response').classList.remove("hidden");
            document.getElementById('notimage').classList.add("hidden");
            document.getElementById('file-image').classList.remove("hidden");
            document.getElementById('file-image').src = URL.createObjectURL(file);
        } else {
            document.getElementById('file-image').classList.add("hidden");
            document.getElementById('notimage').classList.remove("hidden");
            document.getElementById('start').classList.remove("hidden");
            document.getElementById('response').classList.add("hidden");
            document.getElementById("file-upload-form").reset();
        }
    }

    function uploadFile(file) {
        var xhr = new XMLHttpRequest(),
            fileInput = document.getElementById('class-roster-file'),
            fileSizeLimit = 1024; // In MB

        if (xhr.upload) {
            if (file.size <= fileSizeLimit * 1024 * 1024) {
                xhr.open('POST', document.getElementById('file-upload-form').action, true);
                xhr.setRequestHeader('X-File-Name', file.name);
                xhr.setRequestHeader('X-File-Size', file.size);
                xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                xhr.send(file);
            } else {
                output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
            }
        }
    }

    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}

ekUpload();

function ekUploadCover() {
    function Init() {
        console.log("Upload Initialised");
        var fileSelectCover = document.getElementById('file-upload-cover'),
            fileDrag = document.getElementById('file-drag-cover'),
            submitButton = document.getElementById('submit-button');
        fileSelectCover.addEventListener('change', fileSelectHandlerCover, false);
        var xhr = new XMLHttpRequest();

        if (xhr.upload) {
            fileDragCover.addEventListener('dragoverCover', fileDragHoverCover, false);
            fileDragCover.addEventListener('dragleaveCover', fileDragHoverCover, false);
            fileDragCover.addEventListener('dropCover', fileSelectHandlerCover, false);
        }
    }

    function fileDragHoverCover(e) {
        var fileDragCover = document.getElementById('file-drag-cover');
        e.stopPropagation();
        e.preventDefault();
        fileDragCover.className = (e.type === 'dragoverCover' ? 'hover' : 'modal-body file-upload-cover');
    }

    function fileSelectHandlerCover(e) {
        var files = e.target.files || e.dataTransfer.files;
        fileDragHoverCover(e);
        for (var i = 0, f; f = files[i]; i++) {
            parseFileCover(f);
            uploadFileCover(f);
        }
    }

    function outputCover(msg) {
        var m = document.getElementById('messages-cover');
        m.innerHTML = msg;
    }

    function parseFileCover(file) {
        console.log(file.name);
        var imageNameCover = file.name;
        var isGoodCover = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageNameCover);

        if (isGoodCover) {
            document.getElementById('start-cover').classList.add("hidden");
            document.getElementById('response-cover').classList.remove("hidden");
            document.getElementById('notimage-cover').classList.add("hidden");
            // Thumbnail Preview
            document.getElementById('file-image-cover').classList.remove("hidden");
            document.getElementById('file-image-cover').src = URL.createObjectURL(file);
        } else {
            document.getElementById('file-image-cover').classList.add("hidden");
            document.getElementById('notimage-cover').classList.remove("hidden");
            document.getElementById('start-cover').classList.remove("hidden");
            document.getElementById('response-cover').classList.add("hidden");
            document.getElementById("file-upload-form-cover").reset();
        }
    }

    function uploadFileCover(file) {
        var xhr = new XMLHttpRequest(),
            fileInput = document.getElementById('class-roster-file-cover'),
            fileSizeLimit = 1024; // In MB

        if (xhr.upload) {
            if (file.size <= fileSizeLimit * 1024 * 1024) {
                // Start upload
                xhr.open('POST', document.getElementById('file-upload-form-cover').action, true);
                xhr.setRequestHeader('X-File-Name', file.name);
                xhr.setRequestHeader('X-File-Size', file.size);
                xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                xhr.send(file);
            } else {
                output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
            }
        }
    }

    if (window.File && window.FileList && window.FileReader) {
        Init();
    } else {
        document.getElementById('file-drag').style.display = 'none';
    }
}

ekUploadCover();
