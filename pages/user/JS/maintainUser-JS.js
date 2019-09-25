$(document).ready(function()
{
            /*jQuery.validator.setDefaults({
                debug: true,
                success: "valid"
            });*/
            console.log("pretty nanah");
            
            $.ajax({
                url:"PHPcode/addUser-SQL.php",
                type:'POST',
                data:{choice:0}
            })
            .done(data=>{
                if(data!="False")
                {
                    let arr=JSON.parse(data);
                    let tableEntries="";
                    for(let k=0;k<arr.length;k++)
                    {
                    let entry=$("<option></option>").attr("name",arr[k]["ACCESS_LEVEL_ID"]);
                    entry.text(arr[k]["ROLE_NAME"]); 
                    $("#aLevel").append(entry);
                    }   
                }
                else
                {
                    alert("Error");
                }
            });

            $('#inputPassword1, #inputPassword2').on('keyup', function () {

                if($('#inputPassword2').val() != null)
                {

                        if ($('#inputPassword1').val() != $('#inputPassword2').val()) 
                        {
                            // $('#alert-message').html('Passwords match').css('color', 'green');
                            $('#alert-message').html(" <div class='alert alert-danger' role='alert' ><span class='alert-inner--text' ><strong>Passwords do not match</strong></span></div>");
                        } 
                        else 
                        {
                            $('#alert-message').html(" <div class='alert alert-success' role='alert' ><span class='alert-inner--text' ><strong>Passwords match</strong></span></div>");
                        }
                }
                  
              });

            $("#maintainUserSave").on("click",function(e)
                {

                    e.preventDefault();
                    //alert("Yeyi");
                    let accessLevelID = parseInt($("#aLevel option:selected").attr("name")) || -1;
                    let username = $("#inputUsername").val();
                    let password = $("#inputPassword1").val();
                    let userID = $("#USER_ID").val();
                
    
                    //let userStatus = 1;//Active
                    console.log("Update works!");
                    console.log(accessLevelID);
                    if(accessLevelID == -1)
                    {
                        console.log("Its NaN");
                        accessLevelID = "";
                    }
                    else
                    {
                        console.log("Does not go to Nan");
                    }
                   

                    //console.log(username);
                    $.ajax({
                        url:"PHPcode/maintainUser-SQL.php",
                        type:'POST',
                        data:{choice:1 , accessLevel:accessLevelID , email:username , pass:password, user_ID :userID}
                    })
                    .done(data=>{

                        console.log(data);
                        let confirmation = data.trim();
                        if(confirmation== "success")
                        {
                            $("#modal-title-default").text("Success!");
                            $("#modalText").text("User updated successfully.");
                            $("#btnClose").attr("onclick","window.location='../../user.php'");
                            $("#displayModal").modal("show");
                        }
                        else
                        {
                            $("#modal-title-default").text("Error!");
                            $("#modalText").text("Database error");
                           
                            $("#displayModal").modal("show");
                        }
                    });

                });


});