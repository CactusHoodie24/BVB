<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
      var data = {
        email: $("#email").val(),
        password: $("#password").val(),
        action: $("#action").val(),
      };

      $.ajax({
        url: 'sec.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);
          if(response == "success"){
            window.location.reload();
          }
        }
      });
    });
  }
</script>
