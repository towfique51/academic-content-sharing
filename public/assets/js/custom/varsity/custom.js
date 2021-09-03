var varsityClass = function () {
    var convertToSlug = (Text) => {
        return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    }
    var convertToObject = (data) => {
        return JSON.parse(data);
    }
    var submitVarsityForm = () => {
        $('#varsity_submit').click(function (e) {
            e.preventDefault();
            var Varsity = {
                'name': $('#varsity_name').val(),
                'short_name': $('#varsity_short_name').val(),
                'slug': $('#varsity_slug').val(),
            }
            $.ajax({
                type: 'POST',
                url: window.location.origin + '/panel/varsity/add',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: Varsity,

                success: function (data) {
                    Swal.fire({
                        title: "Good job!",
                        text: data.message,
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "Confirm me!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });

                },
                error: function (xhr, status, error) {
                    var reject = convertToObject(xhr.responseText);
                    if (xhr.status === 422) {
                        Swal.fire({
                            title: "Fix this issue first!",
                            text: reject[Object.keys(reject)[0]].toString(),
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Try Again",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });
                    }
                    else {
                        Swal.fire({
                            title: "Error",
                            text: "There is something wrong.",
                            icon: "error",
                            buttonsStyling: false,
                            confirmButtonText: "Try Again",
                            customClass: {
                                confirmButton: "btn btn-danger"
                            }
                        });
                    }
                }
            });
            $('#varsity_add').find('input[type="text"]').val('');
        });
    }
    var slugSet = () => {
        $('#varsity_short_name').keyup(() => {
            $('#varsity_slug').val(convertToSlug($('#varsity_short_name').val()));
        });
    }

    var listVarsity = () => {

        var datatable = $('#kt_datatable').KTDatatable(
            {
                data: {
                    saveState: { cookie: false },
                },
                search: {
                    input: $('#kt_datatable_search_query'),
                    key: 'generalSearch',
                },
                layout: {
                    class: 'datatable-bordered',
                },
                columns: [
                    {
                        field: 'ID',
                        width: 30,
                        type: 'number',
                        selector: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'Full_Name',
                        width: 320,
                        textAlign: 'left',
                    },
                    {
                        field: 'Short_Name',
                        width: 100,
                        selector: false,
                        textAlign: 'left',
                    },
                    {
                        field: 'Department',
                        width: 50,
                        selector: false,
                        textAlign: 'center',
                    },
                    {
                        field: 'Slug',
                        width: 320,
                        selector: false,
                        textAlign: 'left',
                    }
                ],
            });
        datatable.getColumn('Full_Name');

        $('#kt_datatable_search_status').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'Status');
        });

        $('#kt_datatable_search_type').on('change', function () {
            datatable.search($(this).val().toLowerCase(), 'Type');
        });

        $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    }


    var modal = () => {

        // $("#kt_sweetalert_demo_9").click(function (e) {
        //     Swal.fire({
        //         title: "Are you sure?",
        //         text: 'You won"t be able to revert this!',
        //         icon: "warning",
        //         showCancelButton: true,
        //         confirmButtonText: "Yes, delete it!",
        //         cancelButtonText: "No, cancel!",
        //         reverseButtons: true
        //     }).then(function (result) {
        //         if (result.value) {
        //             Swal.fire(
        //                 "Deleted!",
        //                 "Your file has been deleted.",
        //                 "success"
        //             )
        //             // result.dismiss can be "cancel", "overlay",
        //             // "close", and "timer"
        //         } else if (result.dismiss === "cancel") {
        //             Swal.fire(
        //                 "Cancelled",
        //                 "Your imaginary file is safe :)",
        //                 "error"
        //             )
        //         }
        //     });
        // });
        // $("#kt_sweetalert_demo_9").click(()=>{
        //     alert('fsfd');
        // })

        $(document).on('click', '#kt_sweetalert_demo_9', function (e) {
            e.preventDefault();
            let slug = $(this).attr('data-id');
            console.log(typeof slug);
            let url=window.location.origin+"/panel/varsity/delete/"+slug;

            console.log(url);
            Swal.fire({
                title: "Are you sure?",
                text: 'You won"t be able to revert this!',
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                reverseButtons: true
            }).then(function (result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax(
                        {
                            url: url,
                            type: 'DELETE', // Just delete Latter Capital Is Working Fine
                            success: function (response) {
                                Swal.fire(
                                    "Deleted!",
                                    "Your file has been deleted.",
                                    "success"
                                )
                            },
                            error: function (xhr) {
                                Swal.fire(
                                    "Cancelled",
                                    "Your imaginary file is safe :)",
                                    "error"
                                )
                            }
                        });
                        setTimeout(()=>{
                            location.reload();
                        },1000)
                } else if (result.dismiss === "cancel") {
                    Swal.fire(
                        "Cancelled",
                        "Your imaginary file is safe :)",
                        "error"
                    )
                }
            });
        });
    }
    return {
        // public functions
        init: function () {
            submitVarsityForm();
            slugSet();
            listVarsity();
            modal();
        }
    };

}();

jQuery(document).ready(function () {

    varsityClass.init();
});