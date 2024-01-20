<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

<script src="../../assets/vendor/libs/hammer/hammer.js"></script>

<script src="../../assets/vendor/libs/i18n/i18n.js"></script>
<script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>

<script src="../../assets/vendor/js/menu.js"></script>
<!-- endbuild -->


{{-- text editor  --}}



<!-- endbuild -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/quill/katex.js"></script>
<script src="../../assets/vendor/libs/quill/quill.js"></script>

<!-- Main JS -->

<!-- Page JS -->

<!-- Vendors JS -->
<script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
{{-- <script src="../../assets/vendor/libs/dropzone/dropzone.js"></script> --}}
<script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
<script src="../../assets/vendor/libs/swiper/swiper.js"></script>

<!-- Vendors JS -->
    <script src="../../assets/vendor/libs/sweetalert2/sweetalert2.js"></script>
<!-- Main JS -->
<script src="../../assets/js/main.js"></script>
<script src="../../assets/js/forms-editors.js"></script>
  <!-- Page JS -->
    <script src="../../assets/js/extended-ui-sweetalert2.js"></script>

<!-- Page JS -->
<script src="../../assets/js/dashboards-analytics.js"></script>


{{-- list item resource --}}


<!-- Vendors JS -->
<script src="../../assets/vendor/libs/moment/moment.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/i18n/fa.js"></script>
<script src="../../assets/vendor/libs/select2/select2.js"></script>
<script src="../../assets/vendor/libs/select2/i18n/fa.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js"></script>
<script src="../../assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave.js"></script>
<script src="../../assets/vendor/libs/cleavejs/cleave-phone.js"></script>
<!-- Main JS -->

<!-- Page JS -->
<script src="../../assets/vendor/libs/bootstrap-maxlength/bootstrap-maxlength.js"></script>

<script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>

<script src="../../assets/js/forms-extras.js"></script>

<script src="../../assets/js/app-user-list.js"></script>
<script src="../../assets/js/forms-file-upload.js"></script>



{{-- edit product gallery --}}
<script src="../../assets/js/ui-carousel.js"></script>








<script>
    const fullToolbar = [
        [{
                font: []
            },
            {
                size: []
            }
        ],
        ['bold', 'italic', 'underline', 'strike'],
        [{
                color: []
            },
            {
                background: []
            }
        ],
        [{
                script: 'super'
            },
            {
                script: 'sub'
            }
        ],
        [{
                header: '1'
            },
            {
                header: '2'
            },
            'blockquote',
            'code-block'
        ],
        [{
                list: 'ordered'
            },
            {
                list: 'bullet'
            },
            {
                indent: '-1'
            },
            {
                indent: '+1'
            }
        ],
        [{
                direction: 'rtl'
            },
            {
                align: []
            }
        ],
        ['link', 'image', 'video', 'formula'],
        ['clean']
    ];
    $(document).ready(function() {
        $('#example').DataTable();
        const editProductDesc = new Quill('#update-product-form', {
            bounds: '#update-product-form',

            modules: {
                formula: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });  
        
        const createProductDesc = new Quill('#create-product-form', {
            bounds: '#create-product-form',

            modules: {
                formula: true,
                toolbar: fullToolbar
            },
            theme: 'snow'
        });

        // readOnly: true,
        //     theme: 'bubble',





        // fetching rich text

        if ($('#product_id').val() != null) {
            // alert('there is product');

            var id = $('#product_id').val()
            var send_data = {
                'product_id': id,
            }
            console.clear();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                type: "POST",
                cache: false,
                async: true,
                global: false,
                url: "/get-rich-text",
                data: JSON.stringify(send_data),
                contentType: "application/json; charset=utf-8",
                traditional: true,

            }).done(function(data) {
                var d = JSON.parse(data)
                var contents = [];
                for (var i = 0; i < d.ops.length; i++) {
                    // console.log('-----------------------------------');
                    // console.log(d.ops[i]);
                    // console.log('d.ops[i].insert');
                    // console.log(d.ops[i].insert);
                    // console.log('d.ops[i].attributes');
                    // console.log(d.ops[i].attributes);

                    if (d.ops[i].insert === null) {
                        // continue;
                        contents.push({
                            insert: '\n',
                            attributes: d.ops[i].attributes
                        })
                    } else if (d.ops[i].attributes === undefined) {
                        contents.push({
                            insert: d.ops[i].insert,
                        })
                    } else if (d.ops[i].insert === null || d.ops[i].attributes === undefined) {
                        contents.push({
                            insert: '\n',

                        })
                    } else {
                        contents.push({
                            insert: d.ops[i].insert,
                            attributes: d.ops[i].attributes
                        })
                    }

                }
                console.log(contents);
                editProductDesc.setContents(contents);

            });
        }

       


        // saving rich text  --- edit
        $('#update-product').click(function() {

            $('#main_label').addClass('hide');
            $('#loading_label').removeClass('hide');


            var delta = editProductDesc.getContents();
            var id = $('#product_id').val();
            var send_data = {
                'product_id': id,
                data: delta
            }
            // console.dir(delta);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                type: "POST",
                cache: false,
                async: true,
                global: false,
                url: "/save-rich-text",
                data: JSON.stringify(send_data),
                // data: {
                //     content: send_data
                // },
                contentType: "application/json; charset=utf-8",
                traditional: true,

            }).done(function(data) {
                console.dir(data);
                $('#editProductForm').submit();
                //Handle event send done;
            })
        });
        



        // save rich text to temprry --- reate product
        $('#create-product').click(function() {
            
            $('#main_label').addClass('hide');
            $('#loading_label').removeClass('hide');
            var delta = createProductDesc.getContents();
         
            var send_data = {
            
                data: delta
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('input[name="_token"]').val()
                },
                type: "POST",
                cache: false,
                async: true,
                global: false,
                url: "/save-rich-text",
                data: JSON.stringify(send_data),
                contentType: "application/json; charset=utf-8",
                traditional: true,

            }).done(function(data) {
                console.log(data);
                $('#temp_id').val(data)

               
                $('#createMyProductForm').submit();
                //Handle event send done;
            })
        }); 
        
        
        
    });
</script>
