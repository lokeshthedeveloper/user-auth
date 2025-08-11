import $ from 'jquery';
import * as bootstrap from 'bootstrap';

$(function () {

    let modal = new bootstrap.Modal(document.getElementById('userModal'));
    let toastEl = document.getElementById('successToast');
    let toast = new bootstrap.Toast(toastEl);

    function showToast(message) {
        $('#toastMessage').text(message);
        toast.show();
    }

    $('#addUserBtn').click(function () {
        $('#userId').val('');
        $('#userForm')[0].reset();
        $('.error-name, .error-email').text('');
        $('.modal-title').text('Add User');
        modal.show();
    });

    $('#userForm').submit(function (e) {
        e.preventDefault();
        let id = $('#userId').val();
        let url = id ? '/users/' + id : '/users/store';
        let type = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            type: type,
            data: {
                name: $('#name').val(),
                email: $('#email').val(),
                password: $('#password').val(),
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function (res) {
                modal.hide();
                showToast(res.message);
                  setTimeout(() => {
                    location.reload();
                }, 2000);
            },
            error: function (err) {
                $('.error-name').text('');
                $('.error-email').text('');
                 $('.error-password').text('');
                if (err.status === 422) {
                    let errors = err.responseJSON.errors;
                    if (errors.name) $('.error-name').text(errors.name[0]);
                    if (errors.email) $('.error-email').text(errors.email[0]);
                    if (errors.password) $('.error-password').text(errors.password[0]);
                }
            }
        });
    });

    $(document).on('click', '.editUserBtn', function () {
        let row = $(this).closest('tr');
        $('#userId').val(row.data('id'));
        $('#name').val(row.find('td:eq(0)').text());
        $('#email').val(row.find('td:eq(1)').text());
        $('.error-name, .error-email').text('');
        $('.modal-title').text('Edit User');
        modal.show();
    });

    $(document).on('click', '.deleteUserBtn', function () {
        if (!confirm('Are you sure?')) return;
        let id = $(this).closest('tr').data('id');

        $.ajax({
            url: '/users/' + id,
            type: 'DELETE',
            data: {  _method: 'DELETE',_token: $('meta[name="csrf-token"]').attr('content') },
            success: function (res) {
                showToast(res.message);
                setTimeout(() => {
                    location.reload();
                }, 2000);
            }
        });
    });
});
