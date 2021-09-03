var dashBoardClass = function () {
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
                'department': $('#departmentselect').val()
            }
            $('#departmentselect').val([]).trigger('change')
            $.ajax({
                type: 'POST',
                url: '/panel/varsity/',
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
                    $('#varsity_add').find('input[type="text"]').val('');


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
                }
            });
        });
    }
    var departmentSelect = () => {
        $('#departmentselect').select2({
            minimumInputLength: 2,
            ajax: {
                url: '/panel/department/getall',
                dataType: "JSON",
                type: "GET",
                data: function (params) {
                    var queryParameters = {
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data, function (item) {
                            return {
                                text: item.short_name,
                                id: item.id
                            }
                        })
                    };
                }
            }
        });


    }
    var submitDepartmentForm = () => {
        $('#department_submit').click(function (e) {
            e.preventDefault();
            var Department = {
                'name': $('#department_name').val(),
                'short_name': $('#department_short_name').val(),
                'slug': $('#department_slug').val(),
            }
            $.ajax({
                type: 'POST',
                url: '/panel/department/',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: Department,

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
                }
            });
        });
    }
    var slugSet = () => {
        $('#varsity_short_name').keyup(() => {
            $('#department_slug').val(convertToSlug($('#department_short_name').val()));
        });

        $('#department_short_name').keyup(() => {
            $('#department_slug').val(convertToSlug($('#department_short_name').val()));
        });
    }

    return {
        // public functions
        init: function () {

            submitVarsityForm();
            submitDepartmentForm();
            slugSet();
            departmentSelect();
        }
    };

}();

jQuery(document).ready(function () {

    dashBoardClass.init();
});