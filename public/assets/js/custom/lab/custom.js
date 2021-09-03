var labClass = function () {
    var convertToSlug = (Text) => {
        return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    }

    var convertToObject = (data) => {
        return JSON.parse(data);
    }
    var submitLabForm = () => {
        $('#submit').click(function (e) {
            e.preventDefault();
            var lab = {
                'name': $('#lab_name').val(),
                'slug': $('#lab_slug').val(),
                'lab_credit': $('#course_credit').val(),
                'course': $('#course').val(),
            }
            $('#department').val([]).trigger('change');
            $('#varsity').val([]).trigger('change');
            $('#course').val([]).trigger('change');
            $.ajax({
                type: 'POST',
                url: window.location.origin + '/panel/course/lab/add',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: lab,

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
            $('#lab_add').find('input[type="text"]').val('');
        });
    }
    var varsitySelect = () => {
        $('#varsity').select2({
            minimumInputLength: 1,
            maximumSelectionLength: 2,
            placeholder:'Select a varsity',
            ajax: {
                url: window.location.origin + '/panel/varsity/getall',
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
    var departmentSelect = () => {
        $('#varsity').change(() => {
            $('#department').val([]).trigger('change');
            $('#department').select2({
                minimumResultsForSearch: Infinity,
                placeholder:'Select Department',
                ajax: {
                    url: window.location.origin + `/panel/varsity/${$('#varsity').val()}/departments`,
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
                            results: $.map(data.department, function (item) {
                                return {
                                    text: item.short_name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
    }

    var courseSelect = () => {
        $('#varsity, #department').change(() => {
            $('#course').val([]).trigger('change');
            $('#course').select2({
                minimumInputLength: 2,
                maximumSelectionLength: 2,
                placeholder:'Select a course',
                ajax: {
                    url: window.location.origin + `/panel/department/${$('#department').val()}/courses`,
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
                                    text: item.course_code,
                                    id: item.slug
                                }
                            })
                        };
                    }
                }
            });
        })

    }

    var slugSet = () => {
        $('#lab_name').keyup(() => {
            var course=($('#course').val() ? $('#course').val()+'-' : '').trim();
            $('#lab_slug').val(course+convertToSlug($('#lab_name').val()));
        });
    }

    return {
        // public functions
        init: function () {

            submitLabForm();
            
            varsitySelect();
            departmentSelect();
            courseSelect();
            slugSet();
        }
    };

}();

jQuery(document).ready(function () {

    labClass.init();
});