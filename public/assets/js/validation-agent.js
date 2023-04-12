(function () {
    const formValidationExamples = document.getElementById('formValidationExamples'),
      tech = [
        'ReactJS',
        'Angular',
        'VueJS',
        'Html',
        'Css',
        'Sass',
        'Pug',
        'Gulp',
        'Php',
        'Laravel',
        'Python',
        'Bootstrap',
        'Material Design',
        'NodeJS'
      ];

    const fv = FormValidation.formValidation(formValidationExamples, {
      fields: {
        nama: {
          validators: {
            notEmpty: {
              message: 'Mohon Masukkan Nama Agent'
            },
            stringLength: {
              min: 4,
              max: 50,
              message: 'Nama Harus Lebih Besar dari 4 and lebih kecil dari 50 Karakter'
            },
            regexp: {
              regexp: /^[a-zA-Z0-9 ]+$/,
              message: 'The name can only consist of alphabetical, number and space'
            }
          }
        },
        alamat: {
            validators: {
              notEmpty: {
                message: 'Mohon Masukkan alamat agent'
              },
              stringLength: {
                min: 5,
                max: 200,
                message: 'Alamat Harus Lebih Besar dari 5 dan lebih kecil dari 200 characters'
              }
            }
        },

        qty : {
            validators: {
              notEmpty: {
                message: 'Please Qty Stock'
              },
              stringLength: {
                min: 1,
                max: 25,
                message: 'Qty Harus Lebih Besar dari 5 dan lebih kecil dari 25 characters'
              }
            }
        }
      },
      plugins: {
        trigger: new FormValidation.plugins.Trigger(),
        bootstrap5: new FormValidation.plugins.Bootstrap5({
          // Use this for enabling/changing valid/invalid class
          // eleInvalidClass: '',
          eleValidClass: '',
          rowSelector: function (field, ele) {
            // field is the field name & ele is the field element
            switch (field) {
              case 'formValidationName':
              case 'formValidationAlamat':
              case 'formValidationQty':
                return '.col-md-11';
              default:
                return '.row';
            }
          }
        }),
        submitButton: new FormValidation.plugins.SubmitButton(),
        // Submit the form when all fields are valid
        defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
        autoFocus: new FormValidation.plugins.AutoFocus()
      },
      init: instance => {
        instance.on('plugins.message.placed', function (e) {
          //* Move the error message out of the `input-group` element
          if (e.element.parentElement.classList.contains('input-group')) {
            // `e.field`: The field name
            // `e.messageElement`: The message element
            // `e.element`: The field element
            e.element.parentElement.insertAdjacentElement('afterend', e.messageElement);
          }
          //* Move the error message out of the `row` element for custom-options
          if (e.element.parentElement.parentElement.classList.contains('custom-option')) {
            e.element.closest('.row').insertAdjacentElement('afterend', e.messageElement);
          }
        });
      }
    });

    //? Revalidation third-party libs inputs on change trigger

    // Flatpickr
    // flatpickr(formValidationExamples.querySelector('[name="formValidationDob"]'), {
    //   enableTime: false,
    //   // See https://flatpickr.js.org/formatting/
    //   dateFormat: 'Y/m/d',
    //   // After selecting a date, we need to revalidate the field
    //   onChange: function () {
    //     fv.revalidateField('formValidationDob');
    //   }
    // });

    // Typeahead

    // String Matcher function for typeahead
    // const substringMatcher = function (strs) {
    //   return function findMatches(q, cb) {
    //     var matches, substrRegex;
    //     matches = [];
    //     substrRegex = new RegExp(q, 'i');
    //     $.each(strs, function (i, str) {
    //       if (substrRegex.test(str)) {
    //         matches.push(str);
    //       }
    //     });

    //     cb(matches);
    //   };
    // };
  })();
