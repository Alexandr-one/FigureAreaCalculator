$(document).ready(function() {
    $('.confirmDelete').click(function () {
        let id = $(this).data('id');
        document.querySelector('.delete_id').value = id;
    });
});
window.addEventListener('DOMContentLoaded', function() {
    var select = document.querySelector('#main'),
        hide = document.querySelectorAll('.hide');
    function change()
    {
        [].forEach.call(hide, function(el) {
            var add = el.classList.contains(select.value) ? "add" : "remove"
            el.classList[add]('show');
        });
    }
    select.addEventListener('change', change);
    change()
});
