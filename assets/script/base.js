$(document).ready(function(){


  $("#assemblerInventory").on("click", ".botpiece", function(){
        var token = $(this).attr("data-token");
        console.log(token);
        $.ajax({
          url: "/get_collection_by_token",
          type: 'POST',
          data: ("token=" + token),
          dataType: 'json',
          success: function(data) {
              if(data.message == "success"){
                switch (data.CardPosition){
                  case "0":
                    $("#headPiece > img").attr("src", "/assets/images/" + data.Series + data.SubSeries + "-" + data.CardPosition + ".jpeg");
                    break;
                  case "1":
                    $("#midPiece > img").attr("src", "/assets/images/" + data.Series + data.SubSeries + "-" + data.CardPosition + ".jpeg");
                    break;
                  case "2":
                    $("#legPiece > img").attr("src", "/assets/images/" + data.Series + data.SubSeries + "-" + data.CardPosition + ".jpeg");
                    break;
                  default:
                    break;
                }
              }
              else{
                alert("That is not your piece!");
              }
          }
        });
    });

    $("#assemblerInventory").on("click", ".assemblerPiece", function(){
      $(this).children("img").attr("src", "/assets/images/unknown.jpeg");
    });

    $("#assemblerArea").on("click", "#assembleButton", function(){
      $("#assemblerArea").children("div").children("img").attr("src", "/assets/images/unknown.jpeg");
      alert('Not implemented yet!');
    });

    $("body").on("click", "#btnLogin", function(){
      var username = $(this).siblings('input').val();

      $.ajax({
        url: "/login",
        type: 'POST',
        data: ("username=" + username),
        dataType: 'text',
        success: function(data) {
          console.log(data);
          window.location.reload();
        },
        error : function (jqXHR, textStatus, errorThrown){
			       alert('Error with the connection: ' + textStatus + " " + errorThrown);
           }
      });


    });

    $("body").on("click", "#btnLogout", function(){
      $.ajax({
        url: "/logout",
        type: 'POST',
        dataType: 'text',
        success: function(data) {
          console.log(data);
          window.location.reload();
        },
        error : function (jqXHR, textStatus, errorThrown){
			       alert('Error with the connection: ' + textStatus + " " + errorThrown);
       }

      });
    });


    $("#body").on("change", "#selectPortfolio", function(){
      var selectedUser = $(this).children(":selected").val();
      window.location.href="/portfolio/" + selectedUser;
    });

});
