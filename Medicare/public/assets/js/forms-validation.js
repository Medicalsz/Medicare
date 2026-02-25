(function () {
    'use strict';

    function isFieldRequired(field) {
        return field.hasAttribute('required') || field.dataset.required === 'true';
    }

    function fieldValue(field) {
        if (field.type === 'checkbox' || field.type === 'radio') {
            return field.checked ? '1' : '';
        }
        return (field.value || '').trim();
    }

    function getErrorContainer(form, field) {
        var id = field.id || field.name;
        if (!id) {
            return null;
        }
        return form.querySelector('[data-client-error-for="' + CSS.escape(id) + '"]');
    }

    function ensureErrorContainer(form, field) {
        var existing = getErrorContainer(form, field);
        if (existing) {
            return existing;
        }

        var id = field.id || field.name;
        if (!id || !field.parentNode) {
            return null;
        }

        var box = document.createElement('div');
        box.className = 'invalid-feedback d-block error-text';
        box.setAttribute('data-client-error-for', id);
        field.parentNode.appendChild(box);
        return box;
    }

    function setFieldError(form, field, message) {
        field.classList.add('is-invalid');
        var box = ensureErrorContainer(form, field);
        if (box) {
            box.textContent = message;
        }
    }

    function clearFieldError(form, field) {
        field.classList.remove('is-invalid');
        var box = getErrorContainer(form, field);
        if (box) {
            box.remove();
        }
    }

    function validateField(form, field) {
        if (field.type === 'radio') {
            var radioGroup = form.querySelectorAll('input[type="radio"][name="' + CSS.escape(field.name) + '"]');
            var required = false;
            var hasChecked = false;

            radioGroup.forEach(function (radio) {
                if (isFieldRequired(radio)) {
                    required = true;
                }
                if (radio.checked) {
                    hasChecked = true;
                }
            });

            if (!required) {
                return true;
            }

            if (!hasChecked) {
                setFieldError(form, field, 'Ce champ est obligatoire');
                return false;
            }

            radioGroup.forEach(function (radio) {
                clearFieldError(form, radio);
            });
            return true;
        }

        if (!isFieldRequired(field)) {
            return true;
        }

        if (fieldValue(field) === '') {
            setFieldError(form, field, 'Ce champ est obligatoire');
            return false;
        }

        clearFieldError(form, field);
        return true;
    }

    function wireForm(form) {
        var fields = form.querySelectorAll('input, textarea, select');
        fields.forEach(function (field) {
            field.addEventListener('blur', function () {
                validateField(form, field);
            });
            field.addEventListener('input', function () {
                validateField(form, field);
            });
            field.addEventListener('change', function () {
                validateField(form, field);
            });
        });

        form.addEventListener('submit', function (event) {
            var ok = true;
            fields.forEach(function (field) {
                if (!validateField(form, field)) {
                    ok = false;
                }
            });
            if (!ok) {
                event.preventDefault();
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        var forms = document.querySelectorAll('form[novalidate], form.js-validate-form');
        forms.forEach(wireForm);
    });
})();
