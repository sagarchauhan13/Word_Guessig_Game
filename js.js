$(document).ready(function(){
    
    /*Function For Inseting User E-mail & Start The Game*/
    $("#start").click(function(){
        var check_email = $('#user_email').val();
        if(check_email == ''){
            alert("Enter E-mail First");
        } else {
            $('#getwords').load('getwords.php').show();
            var user_id = $('#user_id').val();
            $("#login_form").hide();
            $.ajax({
                url: "index.php",
                type: "post",
                data:{user_email: check_email, user_id: user_id}
            });
        }
    });
    
    /*Function For Fetching Next Qustion*/
    $("#next").click(function(){
//        alert("Next");
        var check_answer = $('#user_ans').val();
        var user_id = $('#user_id').val();
        var word_id = $('#word_id').val();
        if(check_answer == ''){
            alert("Please Write Your Answer");
        } else {
            $.ajax({
                url: "getwords.php",
                type: "post",
                data: {user_ans: check_answer, user_id: user_id, word_id: word_id},
                success: function(getwords){
                    $('#getwords').html(getwords);
                }
            });
        }
    });
    
});