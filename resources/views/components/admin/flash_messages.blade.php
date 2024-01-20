   
                @if (\Session::has('success'))
                    <script type="text/javascript">
                        function massge() {
                            Swal.fire({
                                title: "تبریک",
                                text: {!! json_encode(\Session::get('success')) !!},
                                icon: 'success',
                                timer: 2000,
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                confirmButtonText: 'باشه',
                                buttonsStyling: false
                            });
                        }
                        window.onload = massge;
                    </script>
                @endif
                @if ($errors->any())
                    <script type="text/javascript">
                        function massge() {
                            Swal.fire({
                                title: 'خطا!',
                                text: 'عملیات با خطا مواجه شد',
                                icon: 'error',
                                timer: 3000,
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                                confirmButtonText: 'باشه',
                                buttonsStyling: false
                            });
                        }
                        window.onload = massge;
                    </script>
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif