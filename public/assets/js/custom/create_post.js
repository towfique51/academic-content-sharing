"use strict";
// Class definition

var KTTinymce = function () {    
    // Private functions
    var multipleSelector=function(){
        $('#kt_multipleselectsplitter_2').multiselectsplitter();
    }
    var demos = function () {
        tinymce.init({
            selector: '#kt-tinymce-4',
            height: 500,
            plugins: 'codesample code autolink link image media',
            extended_valid_elements: "p[class=card-text mt-2]",
            style_formats: [
                { title: 'Iframe Div', block: 'div', classes: 'asds' },
            ],
            external_plugins: {
                'helloworld': 'http://127.0.0.1:8000/assets/plugins/custom/tinymce/plugins/helloworld/plugin.js',
            },
            menu: {
                insert: {title: 'Insert', items: 'helloworld'},
            },
            codesample_languages: [
              {text: 'HTML/XML', value: 'markup'},
              {text: 'JavaScript', value: 'javascript'},
              {text: 'CSS', value: 'css'},
              {text: 'PHP', value: 'php'},
              {text: 'Ruby', value: 'ruby'},
              {text: 'Python', value: 'python'},
              {text: 'Java', value: 'java'},
              {text: 'C', value: 'c'},
              {text: 'C#', value: 'csharp'},
              {text: 'C++', value: 'cpp'}
            ],
            toolbar: 'codesample code pageembed autolink link image media helloworld',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
          });       
    }

    return {
        // public functions
        init: function() {
            demos();
            multipleSelector();
        }
    };
}();

// Initialization
jQuery(document).ready(function() {
    KTTinymce.init();
});