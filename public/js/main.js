$('.post').find('.interactions').find('.edit').on('click', function () {
    event.preventDefault();

    var postBody =
        event
            .target
            .parentNode
            .parentNode
            .childNodes[1].textContent;
    console.log(postBody);
    $('#post-body').val(postBody);
    $('#edit-modal').modal();
});