"use strict";
// Class definition

var KTTinymce = function () {
    var tagify1GetValue = [];
    
    // Private functions

    var convertToObject = (data) => {
        return JSON.parse(data);
    }
    var convertToSlug = (Text) => {
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    }
    var varsitySelect = () => {
        $('#varsity').select2({
            placeholder: "Select a Varsity",
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
                placeholder: "Select a Department",
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
                placeholder: "Select a Course",
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
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        })

    }
    var typeSelect = () => {
        $('#type').select2({
            placeholder: "Select a state",
            allowClear: true,
            minimumResultsForSearch: Infinity 
        });

    }
    var selector=()=>{
        $('#course, #type').change(() => {
            var url='';
            if($('#type').val()=='lab'){
                url=window.location.origin + `/panel/course/${$('#course').val()}/labs`
            }
            else if($('#type').val()=='assignment'){
                url=window.location.origin + `/panel/course/${$('#course').val()}/assignments`
            }

            else if($('#type').val()=='note'){
                url=window.location.origin + `/panel/course/${$('#course').val()}/notes`
            }
            else if($('#type').val()=='assessment'){
                url=window.location.origin + `/panel/course/${$('#course').val()}/assessments`
            }
            $('#type_id').select2({
                minimumResultsForSearch: Infinity,
                ajax: {
                    url: url,
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
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
        });
    }
    var tags = function () {
        var input = document.getElementById('metatags');
        var tagify1 = new Tagify(input, {
            pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
            delimiters: ", ", // add new tags when a comma or a space character is entered
            maxTags: 6,
            blacklist: ["fuck", "shit", "pussy"],
            //keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
            transformTag: transformTag,
            dropdown: {
                enabled: 3,
            }
        });
        function transformTag(tagData) {
            var states = [
                'success',
                'primary',
                'danger',
                'success',
                'warning',
                'dark',
                'primary',
                'info'];

            tagData.class = 'tagify__tag tagify__tag-light--' + states[KTUtil.getRandomInt(0, 7)];

            if (tagData.value.toLowerCase() == 'shit') {
                tagData.value = 's✲✲t'
            }
        }

        tagify1.on('invalid', function (e) {
            console.log(e, e.detail);
        });
        tagify1.on('add', function (e) {
            tagify1GetValue.push(e.detail.data.value);
            console.log(e, e.detail);
        });
    }
    var editor  = function () {
        CKEDITOR.replace('editor1',
            {
                customConfig: window.location.origin+'/assets/js/ckeditor/customconfig.js',
                codeSnippet_theme: 'monokai_sublime',
                on: {
                    instanceReady: function () {
                        this.dataProcessor.htmlFilter.addRules({
                            elements: {
                                p: function (el) {
                                    if (!el.attributes.class)
                                        el.attributes.class = 'card-text mt-2';
                                },
                                div: function (el) {
                                    if (!el.attributes.class)
                                        el.attributes.class = 'ratio ratio-16x9';
                                }
                            }
                        });
                    }
                }
            }

        );
    }
    var autoSize=()=>{
        $('#metadescription').maxlength({
            threshold: 5,
            warningClass: "label label-danger label-rounded label-inline",
            limitReachedClass: "label label-primary label-rounded label-inline"
        });
    }
    var slugForPost=()=>{
        $('#title').change(() => {
            var course=(!!$('#course').select2('data')[0].text ? ($('#course').select2('data')[0].text).toLowerCase()+'-' : '').trim();
            $('#slug').val(convertToSlug(course)+'-'+$('#type').val()+'-'+convertToSlug($('#title').val()))
            
        });
        
    }
    var reset=()=>{
        $('#varsity,#department,#course,type').change(() => {
            $('#slug').val("")
        });
        $('#varsity,#department').change(() => {
            $('#course').val("")
            $('#type_id').val([]).trigger('change');
        });
        
    }
    var submitForm = () => {
        $('#submit').click(function (e) {
            e.preventDefault();
            var Post = {
                'title': $('#title').val(),
                'slug': $('#slug').val(),
                'body': CKEDITOR.instances.editor1.getData(),
                'type': $('#type').val(),
                'type_id': $('#type_id').val(),
                'metadescription': $('#metadescription').val(),
                'metatag': tagify1GetValue.join(),
                'tags': tagify1GetValue.join(', '),
                'varsity':($('#varsity').select2('data')[0]['text']).trim(),
                'department':($('#department').select2('data')[0]['text']).trim(),
                'course':($('#course').select2('data')[0]['text']).trim()
                
            };
            $('#department').val([]).trigger('change');
            $('#varsity').val([]).trigger('change');
            $('#course').val([]).trigger('change');
            $.ajax({
                type: 'POST',
                url: window.location.origin + '/panel/post/add',
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                data: Post,
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
            $('#lab_add').find('input[type="text"]').val('');
        });
    }

    return {
        // public functions
        init: function () {
            editor();
            varsitySelect();
            departmentSelect();
            courseSelect();
            typeSelect();
            selector();
            tags();
            autoSize();
            slugForPost();
            reset();
            submitForm();
        }
    };
}();

// Initialization
jQuery(document).ready(function () {
    KTTinymce.init();
});