<!-- General JS Scripts -->
<script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
<script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/stisla.js') }}"></script>
@yield('js')
<!-- JS Libraies -->
<script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
{{-- search table --}}
<script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script><!-- Template JS File -->

<script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
{{-- data Table --}}<!-- jQuery -->
<script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
<!-- DataTables JS -->
<script src="{{ asset('admin/assets/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
</script>
<script src="{{ asset('admin/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

{{-- sweet Alert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- code editor --}}
<script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>
{{-- Tag Plugin --}}
<script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script>
    $(document).ready(function() {

        $('#table-2').DataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }],
        });
    });
    // {{-- upload img Profile --}}
    $.uploadPreview({
        input_field: "#image-upload", // Default: .image-upload
        preview_box: "#image-preview", // Default: .image-preview
        label_field: "#image-label", // Default: .image-label
        label_default: "Choose File", // Default: Choose File
        label_selected: "Change File", // Default: Change File
        no_label: false, // Default: false
        success_callback: null // Default: null
    });
</script>
<script>
    // add csrf token in ajax request
    $.ajaxSetup({
        headers: {
            'X_CSRF_TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Toast Notification popup
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    // delete popup   should add this class delete-item in btn
    $(document).ready(function() {

        $('.delete-item').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to Delete this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = $(this).attr("href");
                    console.log(url);
                    $.ajax({
                        method: "DELETE",
                        url: url,
                        success: function(data) {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'Deleted!',
                                    data.message,
                                    'success',
                                );
                                window.location.reload();
                            } else if (data.status === 'error') {
                                Swal.fire(
                                    'Error!',
                                    data.message,
                                    'error',
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    })
</script>
