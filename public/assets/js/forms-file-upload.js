/**
 * File Upload
 */

'use strict';

(function() {

    var messages = {
        dictDefaultMessage: "فایل‌ها را برای ارسال اینجا رها کنید",
        dictFallbackMessage: "مرورگر شما از ارسال فایل با کشیدن و رها کردن پشتیبانی نمی‌کند.",
        dictFallbackText: "لطفا از فرم زیر برای ارسال فایل های خود مانند دوران های گذشته استفاده کنید.",
        dictFileTooBig: "فایل خیلی بزرگ است ({{filesize}}MiB). حداکثر اندازه فایل: {{maxFilesize}}MiB.",
        dictInvalidFileType: "شما نمی‌توانید فایل‌هایی از این نوع را ارسال کنید.",
        dictResponseError: "سرور با کد {{statusCode}} پاسخ داد.",
        dictCancelUpload: "لغو ارسال",
        dictCancelUploadConfirmation: "آیا از لغو کردن این ارسال اطمینان دارید؟",
        dictRemoveFile: "حذف فایل",
        dictMaxFilesExceeded: "شما نمی‌توانید فایل دیگری ارسال کنید."
    }

    // previewTemplate: Updated Dropzone default previewTemplate
    // ! Don't change it unless you really know what you are doing
    const previewTemplate = `<div class="dz-preview dz-file-preview">
<div class="dz-details">
  <div class="dz-thumbnail">
    <img data-dz-thumbnail>
    <span class="dz-nopreview">No preview</span>
    <div class="dz-success-mark"></div>
    <div class="dz-error-mark"></div>
    <div class="dz-error-message"><span data-dz-errormessage></span></div>
    <div class="progress">
      <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" data-dz-uploadprogress></div>
    </div>
  </div>
  <div class="dz-filename" data-dz-name></div>
  <div class="dz-size" data-dz-size></div>
</div>
</div>`;

    // ? Start your code from here

    // Basic Dropzone
    // --------------------------------------------------------------------
    // var options = {
    //     previewTemplate: previewTemplate,
    //     parallelUploads: 1,
    //     maxFilesize: 5,
    //     addRemoveLinks: true,
    //     maxFiles: 1
    // };
    // Object.assign(options, messages);

    // const dropzoneBasic = document.querySelector('#dropzone-basic');
    // if (dropzoneBasic) {
    //   const myDropzone = new Dropzone(dropzoneBasic, options);
    // }

    // Multiple Dropzone
    // --------------------------------------------------------------------
    var options = {
        previewTemplate: previewTemplate,
        parallelUploads: 1,
        maxFilesize: 5,
        addRemoveLinks: true,
        uploadMultiple: true,
        paramName: "PostedFiles",
        createImageThumbnails: true,
        autoProcessQueue: false,
        // url: "http://localhost:8000/admin/products",
        // success: function(file, response) { // Dropzone upload response
        //     console.log('inside success');
        //     var jsonObj = JSON.parse(response);

        //     if (jsonObj.status == 0) {
        //         alert(jsonObj.msg);
        //     }
        // }
    };
    Object.assign(options, messages);

    // const dropzoneMulti = document.querySelector('#createProductForm');
    // if (dropzoneMulti) {
    //     const myDropzoneMulti = new Dropzone(dropzoneMulti, options);
    // }




    // Dropzone.options.myDropzone = {
    //     url: 'http://localhost:8000/admin/products',
    //     autoProcessQueue: false,
    //     paramName: "file",
    //     clickable: true,
    //     maxFilesize: 5, //in mb
    //     addRemoveLinks: true,
    //     acceptedFiles: '.png,.jpg',
    //     dictDefaultMessage: "Upload your file here",
    //     init: function() {
    //         this.on("sending", function(file, xhr, formData) {
    //             console.log("sending file");
    //         });
    //         this.on("success", function(file, responseText) {
    //             console.log('great success');
    //         });
    //         this.on("addedfile", function(file) {

    //             console.log('file added');
    //             console.log(file);
    //         });
    //     }
    // };
    Dropzone.options.dropzone = {
        maxFilesize: 12,
        renameFile: function(file) {
            var dt = new Date();
            var time = dt.getTime();
            return time + file.name;
        },
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        timeout: 50000,
        removedfile: function(file) {
            var name = file.upload.filename;
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                type: 'POST',
                url: '{{ url("/676fbdd1/products/delete") }}',
                data: { filename: name },
                success: function(data) {
                    console.log("File has been successfully removed!!");
                },
                error: function(e) {
                    console.log(e);
                }
            });
            var fileRef;
            return (fileRef = file.previewElement) != null ?
                fileRef.parentNode.removeChild(file.previewElement) : void 0;
        },

        success: function(file, response) {
            console.log(response);
        },
        error: function(file, response) {
            // return false;
            console.log(response)
        }
    };



})();