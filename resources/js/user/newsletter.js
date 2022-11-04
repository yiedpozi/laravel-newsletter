import jQuery from 'jquery';
import Swal from 'sweetalert2';

window.$ = jQuery;
window.Swal = Swal;

$(document).ready(function() {
    $('form .btn-newsletter-delete').on('click', function(e) {
        e.preventDefault();

        window.Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this newsletter?',
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: 'Yes, delete it!',
            customClass: {
                confirmButton: 'swal2-confirm-delete',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    });

    $('form .btn-newsletter-restore').on('click', function(e) {
        e.preventDefault();

        window.Swal.fire({
            title: 'Confirm Restore',
            text: 'Are you sure you want to restore this newsletter?',
            icon: 'warning',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonText: 'Yes, restore it!',
            customClass: {
                confirmButton: 'swal2-confirm-restore',
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $(this).closest('form').submit();
            }
        });
    });
});
