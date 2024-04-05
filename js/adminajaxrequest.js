//Ajax call for Amin login Verification
function checkAdminLogin() {
  console.log("clicked");
  var adminLogEmail = $("#adminLogemail").val();
  var adminLogPass = $("#adminLogpass").val();
  $.ajax({
    url: "admin/admin.php",
    method: "POST",
    data: {
      checkLogEmail: "checklogemail",
      adminLogEmail: adminLogEmail,
      adminLogPass: adminLogPass,
    },
    success: function (data) {
      if (data == 0) {
        $("#statusAdminLogMsg").html(
          '<small class="alert alert-danger"> Invalid Email ID or Password !</small>'
        );
      } else if (data == 1) {
        $("#statusAdminLogMsg").html(
          '<small class="alert alert-success"> Sucess Loading...!</small>'
        );
        clearAdminLoginField();
        setTimeout(() => {
          window.location.href = "admin/admindashboard.php";
        }, 1000);
      }
    },
  });
}

function clearAdminLoginField() {
  $("#adminLoginForm").trigger("reset");
}

// Empty Login Fields and Status Msg
function clearAdminLoginWithStatus() {
  $("#statusAdminLogMsg").html(" ");
  clearAdminLoginField();
}
