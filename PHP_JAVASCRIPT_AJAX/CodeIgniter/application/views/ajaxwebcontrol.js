
    $(document).ready(
        function()
        {
            $('#InputComment').submit(function()
                {

                    // show that something is loading
                    $('#output').html("<b>Loading response...</b>");
                    /*
                     * 'post_receiver.php' - where you will pass the form data
                     * $(this).serialize() - to easily read form data
                     * function(data){... - data contains the response from post_receiver.php
                     */
                    var object = {name:"<?php echo $name?>" content: $(this).serialize()["content"], timestamp: new Date().getTime(), id:2};
                    localStorage.setItem("comment",JSON.stringify(object));

                    $.ajax({
                        type: 'POST',
                        url: '/MyWebsite/CodeIgniter/index.php/addcomments/index',
                        data: $(this).serialize()
                        //.serialize()
                    })
                        .done(function(data){

                            // show the response
                            $('#output').html(data);

                        })
                        .fail(function() {

                            // just in case posting your form failed
                            alert( "Posting failed." );

                        });

                    // to prevent refreshing the whole page page

                }
            );


            $('#DeleteComment').submit(function()
                {

                    // show that something is loading

                    /*
                     * 'post_receiver.php' - where you will pass the form data
                     * $(this).serialize() - to easily read form data
                     * function(data){... - data contains the response from post_receiver.php
                     */
                    $.ajax({
                        type: 'POST',
                        url: '/MyWebsite/CodeIgniter/index.php/delete_comments/index',
                        data: $(this).serialize()
                        //.serialize()
                    })
                        .done(function(data){

                            // show the response
                            $('#output').html(data);

                        })
                        .fail(function() {

                            // just in case posting your form failed
                            alert( "Posting failed." );

                        });

                    // to prevent refreshing the whole page page

                }
            );


        }
    );
