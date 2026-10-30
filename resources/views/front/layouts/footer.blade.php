@include('front.layouts.user-footer')

<script>

$(document).on('click', '.toggle-criteria', function (e) {
    e.preventDefault();

    let box = $(this)
        .closest('.property-card')
        .find('.mb_v_ar_show');

    box.toggleClass('active');

    // console.log(box.attr('class'));

    $(this).find('i').toggleClass('fa-angle-down fa-angle-up');
});
</script>