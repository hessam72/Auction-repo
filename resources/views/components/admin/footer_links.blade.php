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

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

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

{{-- <script src="../../assets/js/app-user-list.js"></script> --}}
<script src="../../assets/js/forms-file-upload.js"></script>



{{-- edit product gallery --}}
<script src="../../assets/js/ui-carousel.js"></script>
<script src="../../assets/vendor/libs/bs-stepper/bs-stepper.js"></script>


<script src="../../assets/js/wizard-ex-create-deal.js"></script>

<script src="../../assets/js/form-wizard-numbered.js"></script>

<script src="../../assets/js/form-wizard-validation.js"></script>




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
    const default_config = {
        dateFormat: "Y-m-d H:i",
        enableTime: false,
        minDate: "today",

    }  
    const with_time_config = {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
        minDate: "today",

    }
    $("#datePickerTime").flatpickr(with_time_config);
    $("#datePicker").flatpickr(default_config);
  

    $(document).ready(function() {

        // flatpicker







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
                console.log('data from ajax')
                console.log(data)
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

    // create specialoffer form wizard
    //showing currect item to select in form wizard
    $('#form_wizard_select_item_btn').click(function() {
        if ($('#bid_package_select').prop('checked')) {
            //hide product selection
            $('.product_selection_drop').hide();
            $('.bidPackage_selection_drop').show();
        }
        else if($('#product_select').prop('checked')) {
            //hide bid package selection
            $('.bidPackage_selection_drop').hide();
            $('.product_selection_drop').show();
        }

    });
    $('#submit_sp_wizard_form').click(function(){
        // alert('dsdsdssds')
        // $('#wizard-create-deal-form').submit();
    });






    // dashboard analitics
    var monthly_income_string=$('#chart_value_monthly_income').val();
    var monthly_income = monthly_income_string.split(",").map(Number);

      var monthly_singups_string=$('#chart_value_monthly_singups').val();
    var monthly_singups = monthly_singups_string.split(",").map(Number);

  var monthly_auctions_string=$('#chart_value_monthly_auctions').val();
    var monthly_auctions = monthly_auctions_string.split(",").map(Number);

  var monthly_products_string=$('#chart_value_monthly_products').val();
    var monthly_products = monthly_products_string.split(",").map(Number);

  var monthly_products_sales_string=$('#chart_value_monthly_products_sales').val();
    var monthly_products_sales = monthly_products_sales_string.split(",").map(Number);

  var monthly_packages_sales_string=$('#chart_value_monthly_packages_sales').val();
    var monthly_packages_sales = monthly_packages_sales_string.split(",").map(Number);




    let cardColor,
        headingColor,
        labelColor,
        legendColor,
        borderColor,
        shadeColor;

    if (isDarkStyle) {
        cardColor = config.colors_dark.cardColor;
        headingColor = config.colors_dark.headingColor;
        labelColor = config.colors_dark.textMuted;
        legendColor = config.colors_dark.bodyColor;
        borderColor = config.colors_dark.borderColor;
        shadeColor = "dark";
    } else {
        cardColor = config.colors.cardColor;
        headingColor = config.colors.headingColor;
        labelColor = config.colors.textMuted;
        legendColor = config.colors.bodyColor;
        borderColor = config.colors.borderColor;
        shadeColor = "light";
    }

    Apex.chart = {
        fontFamily: "inherit",
        locales: [
            {
                name: "fa",
                options: {
                    months: [
                        "ژانویه",
                        "فوریه",
                        "مارس",
                        "آوریل",
                        "می",
                        "ژوئن",
                        "جولای",
                        "آگوست",
                        "سپتامبر",
                        "اکتبر",
                        "نوامبر",
                        "دسامبر",
                    ],
                    shortMonths: [
                        "ژانویه",
                        "فوریه",
                        "مارس",
                        "آوریل",
                        "می",
                        "ژوئن",
                        "جولای",
                        "آگوست",
                        "سپتامبر",
                        "اکتبر",
                        "نوامبر",
                        "دسامبر",
                    ],
                    days: [
                        "یکشنبه",
                        "دوشنبه",
                        "سه‌شنبه",
                        "چهارشنبه",
                        "پنجشنبه",
                        "جمعه",
                        "شنبه",
                    ],
                    shortDays: ["ی", "د", "س", "چ", "پ", "ج", "ش"],
                    toolbar: {
                        exportToSVG: "دریافت SVG",
                        exportToPNG: "دریافت PNG",
                        menu: "فهرست",
                        selection: "انتخاب",
                        selectionZoom: "بزرگنمایی قسمت انتخاب شده",
                        zoomIn: "بزرگ نمایی",
                        zoomOut: "کوچک نمایی",
                        pan: "جا به جایی",
                        reset: "بازنشانی بزرگ نمایی",
                    },
                },
            },
        ],
        defaultLocale: "fa",
    };
    





   
    const analyticsBarChartEl = document.querySelector("#analyticsBarChart"),
        analyticsBarChartConfig = {
            chart: {
                height: 250,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "20%",
                    borderRadius: 3,
                    startingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            colors: ['#5a8dee' , '#ee8dee' ,'#5a833e'],
            // income data 
            series: [
                {
                    name: "حراجی جدید",
                    data: monthly_auctions,
                },
                {
                    name: "ثبت نامی جدید",
                    data: monthly_singups,
                }, 
                {
                    name: "محصولات جدید",
                    data: monthly_products,
                },
            ],
            grid: {
                borderColor: borderColor,
                padding: {
                    bottom: -8,
                },
            },
            xaxis: {
                categories: [
                        "ژانویه",
                        "فوریه",
                        "مارس",
                        "آوریل",
                        "می",
                        "ژوئن",
                        "جولای",
                        "آگوست",
                        "سپتامبر",
                        "اکتبر",
                        "نوامبر",
                        "دسامبر",
                    ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: labelColor,
                    },
                },
            },
            yaxis: {
                min: 0,
                max: 30,
                tickAmount: 3,
                labels: {
                    style: {
                        colors: labelColor,
                    },
                },
            },
            legend: {
                show: false,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + "";
                    },
                },
            },
        };
    if (
        typeof analyticsBarChartEl !== undefined &&
        analyticsBarChartEl !== null
    ) {
        const analyticsBarChart = new ApexCharts(
            analyticsBarChartEl,
            analyticsBarChartConfig
        );
        analyticsBarChart.render();
    }

    // bar chart 2
   
    const analyticsBarChartEl_2 = document.querySelector("#analyticsBarChart_2"),
        analyticsBarChartConfig_2 = {
            chart: {
                height: 250,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: "20%",
                    borderRadius: 3,
                    startingShape: "rounded",
                },
            },
            dataLabels: {
                enabled: false,
            },
            colors: ['#5a8dee' , '#ee8dee' ],
            // income data 
            series: [
                {
                    name: "فروش بید",
                    data: monthly_products_sales,
                },
                {
                    name: "فروش محصول",
                    data: monthly_packages_sales,
                }, 
               
            ],
            grid: {
                borderColor: borderColor,
                padding: {
                    bottom: -8,
                },
            },
            xaxis: {
                categories: [
                        "ژانویه",
                        "فوریه",
                        "مارس",
                        "آوریل",
                        "می",
                        "ژوئن",
                        "جولای",
                        "آگوست",
                        "سپتامبر",
                        "اکتبر",
                        "نوامبر",
                        "دسامبر",
                    ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    style: {
                        colors: labelColor,
                    },
                },
            },
            yaxis: {
                min: 0,
                max: 1000,
                tickAmount: 3,
                labels: {
                    style: {
                        colors: labelColor,
                    },
                },
            },
            legend: {
                show: false,
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " دلار ";
                    },
                },
            },
        };
    if (
        typeof analyticsBarChartEl_2 !== undefined &&
        analyticsBarChartEl_2 !== null
    ) {
        const analyticsBarChart_2 = new ApexCharts(
            analyticsBarChartEl_2,
            analyticsBarChartConfig_2
        );
        analyticsBarChart_2.render();
    }

 // Registrations Bar Chart new singups mini bar
    // --------------------------------------------------------------------
    const registrationsBarChartEl = document.querySelector(
            "#registrationsBarChart"
        ),
        registrationsBarChartConfig = {
            chart: {
                height: 95,
                width: 155,
                type: "bar",
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    barHeight: "80%",
                    columnWidth: "50%",
                    startingShape: "rounded",
                    endingShape: "rounded",
                    borderRadius: 2,
                    distributed: true,
                },
            },
            grid: {
                show: false,
                padding: {
                    top: -20,
                    bottom: -20,
                    left: 0,
                    right: 0,
                },
            },
            colors: [
                config.colors_label.warning,
                config.colors_label.warning,
                config.colors_label.warning,
                config.colors_label.warning,
                config.colors.warning,
                config.colors_label.warning,
                config.colors_label.warning,
            ],
            dataLabels: {
                enabled: false,
            },
            series: [
                {
                    name: "ثبت نامی این ماه",
                    data: monthly_singups,
                },
            ],
            legend: {
                show: false,
            },
            xaxis: {
                categories: [
                        "ژانویه",
                        "فوریه",
                        "مارس",
                        "آوریل",
                        "می",
                        "ژوئن",
                        "جولای",
                        "آگوست",
                        "سپتامبر",
                        "اکتبر",
                        "نوامبر",
                        "دسامبر",
                    ],
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
                labels: {
                    show: false,
                },
            },
            yaxis: {
                labels: {
                    show: false,
                },
            },
        };
    if (
        typeof registrationsBarChartEl !== undefined &&
        registrationsBarChartEl !== null
    ) {
        const registrationsBarChart = new ApexCharts(
            registrationsBarChartEl,
            registrationsBarChartConfig
        );
        registrationsBarChart.render();
    }



    // Conversion - Bar Chart income charts
    // --------------------------------------------------------------------
    
       
   

</script>
