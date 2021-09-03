var departmentClass = function () {
    var convertToSlug = (Text) => {
        return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    }
    var convertToObject = (data) => {
        return JSON.parse(data);
    }
    var varsitySelect = () => {
        $('#varsity_select').select2({
            minimumInputLength: 2,
            allowClear: true,
            placeholder: "Select a Varsity",
            ajax: {
                url: window.location.origin+'/panel/varsity/getall',
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
                    'varsity':[$('#varsity_select').val()]
                }
                $.ajax({
                    type: 'POST',
                    url: window.location.origin+'/panel/department/add',
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
                        else {
                            Swal.fire({
                                title: "Fix this issue first!",
                                text: xhr.responseText,
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
                $("#add_department").trigger('reset');
                $("#varsity_select").empty().trigger('change') 
            });
        }
        var slugSet = () => {
            $('#department_short_name').keyup(() => {
                var varsity=(!!$('#varsity_select').select2('data')[0].text ? convertToSlug(($('#varsity_select').select2('data')[0].text).toLowerCase())+'-' : '').trim();
                $('#department_slug').val(varsity+convertToSlug($('#department_short_name').val()));
            });
            $('#varsity_select').change(() => {
                var varsity1=(!!$('#varsity_select').select2('data')[0].text ? convertToSlug(($('#varsity_select').select2('data')[0].text).toLowerCase())+'-' : '').trim();
                var department=(!!$("#department_short_name").val() ? $("#department_short_name").val() : '').trim();
                $('#department_slug').val(varsity1+convertToSlug(department));
            });
        }

        return {
            // public functions
            init: function () {
                submitDepartmentForm();
                slugSet();
                varsitySelect();
            }
        };

    }();

    jQuery(document).ready(function () {

        departmentClass.init();
    });