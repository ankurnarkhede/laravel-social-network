/**
 * Created by smartankur4u on 21/10/17.
 */

// open modal
//     $(document).ready(function(){
//         $("#edit_post").click(function(){
//             console.log('Clicked on edit...!');
//             $('#edit_post_modal').modal('open');
//
//         });
//     });


$('#post_save').on('click', function () {
    $.ajax({
        method:'POST',
        url:url,
        data:{body: $('textarea#post_body').val(), postID:$('#postID').val(), _token:token}
    })

        .done(function (msg) {
            console.log(JSON.stringify(msg));
            $('#display_post_body_'.concat($('#postID').val())).text(msg['new_body']);

        });

});

$('.like').on('click', function (event) {
    event.preventDefault();
    var isLike=event.target.previousElementSibling==null?true:false;
    // console.log(isLike);
    $.ajax({
        method: 'POST',
        url:url_like,
        data: {isLike:isLike, postID:..., _token:token}
    })


});



