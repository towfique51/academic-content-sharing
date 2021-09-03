var assingmentClass = function () {
    var convertToSlug = (Text) => {
        return Text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-');
    }

    var convertToObject = (data) => {
        return JSON.parse(data);
    }
    var submitAssessmentForm = () => {
        $('#submit').click(function (e) {
            
            e.preventDefault();
            var lab = {
                'name': $('#assessment_name').val(),
                'slug': $('#assessment_slug').val(),
                'course': $('#course').val(),
            }
            $('#department').val([]).trigger('change');
            $('#varsity').val([]).trigger('change');
            $('#course').val([]).trigger('change');
            $.ajax({
                type: 'POST',
                url: window.location.origin + '/panel/course/assessment/add',
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
            $('#assessment_add').find('input[type="text"]').val('');
        });
    }
    var varsitySelect = () => {
        $('#varsity').select2({
            placeholder:'Select a Varsity',
            minimumInputLength: 2,
            maximumSelectionLength: 2,
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
                placeholder:'Select a Department',
                minimumResultsForSearch: Infinity,
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
                placeholder:'Select a Course',
                minimumInputLength: 2,
                maximumSelectionLength: 2,
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
        $('#assessment_name').keyup(() => {
            var course=($('#course').val() ? $('#course').val()+'-' : '').trim();
            $('#assessment_slug').val(course+convertToSlug($('#assessment_name').val()));
        });
    }

    return {
        // public functions
        init: function () {
            submitAssessmentForm();
            varsitySelect();
            departmentSelect();
            courseSelect();
            slugSet();
        }
    };

}();

jQuery(document).ready(function () {

    assingmentClass.init();
});