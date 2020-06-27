
<?php
  if(empty($_SESSION['user'])){
    header('Location /?unlogged');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Parallax</title>
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
  </script>
</head>
<style>

  *{
    padding:0;
    margin:0;
  }

  html{
    font-size: 62%;
  }

  body{
    display: flex;
    justify-content:center;
    align-items:center;
    background: black;
  }
  .container{
    position:relative;
    top:30px;
    display:grid;
    grid-template-columns: 1fr 3fr;
    grid-gap:2rem;
    background:black;
    height:800px;
    width:80vw;
  }

  .users-container{
    padding:1rem;
    justify-content:center;
    overflow:auto;
    height:100%;
    text-align:center;
  }

  .users-box{
    width:100%;
    height:30px;
    background-image:linear-gradient(to left, #fe8c00,#f83600);
    border-radius:25px;
    margin-top:8px;
    text-align:center;
    align-content:center;
  }

  .users{
    align-content:center;
    font-size:2rem;
  }

  .messages-container{
    padding:0.5rem;

  }


  .box-wrap{
    background-image:linear-gradient(to left, #fe8c00,#f83600);
    width:100%;
    height:100%;
    padding:1.5rem;
    border-radius:25px;
    overflow:auto;
  }

  .box-messages{
    background:black;
    width:100%;
    height:800px;
    border-radius:20px;
    overflow:auto;    
  }

  .messages{
    width:30%;
    height:50px;
    background-image:linear-gradient(to left, #fe8c00,#f83600);
    color:black;
    border-radius:8px;
    margin-top:15px;
    margin-left:15px;
    text-align:center;
  }

  .messages > h1{

  }

  .messages > p {
    font-size:2rem
  }

  .input-container{
    align-content:center;
    margin-top:10px;
    width:100%;
    background:orange;
    border-radius:25px;
    padding:0.8rem;
    background-image:linear-gradient(to left, #fe8c00,#f83600);
  }

  .input-container > input{
    background:none;
    outline:none;
    border:none;
    width:80%;
    height:100%;
    margin:0;
    position:relative;
    top:0;
    left:0;
    padding:1rem;
    font-size:2rem;
    font-weight:bold;
    color:black;
    background-image:linear-gradient(to left, #fe8c00,#f83600);
    border-radius:25px;
  }

</style>
<body>

<div class="container">
  <div class="users-container">
    <?php foreach($users as $user){?>
      <div class="users-box">
          <h3 class="users"><?= $user?></h3>
      </div>
    <?php } ?> 

  </div>

  <div class="messages-container">
    <div class="box-wrap">
      <div class="box-messages">
        
      </div>
    </div>

    <div class="input-container">
      <input class="message" type="text" placeholder="messages">    
    </div>
  </div>
        <input id="user"  type="hidden" readonly value=<?= $_SESSION['user']?>>
</div>
  

  <script>
    $('document').ready(function(){


      var flag = 0;
      function receiveMessage(){
        $.ajax({
          type:'get',
          url:'receiveMessage',
          data:{
            index: flag
          },
          success:function(data){
            let result = JSON.parse(data);
            if(result['items']){
              result['items'].forEach(item=>{
                flag = item.id;
                $('.box-messages').append(`
                  <div class="messages">
                    <h1>${item.name}</h1>
                    <p>${item.body}</p>
                  </div>
                `)
              })
            }
          }
        })
        $(".box-messages").animate({ scrollTop: $('.box-messages').prop("scrollHeight")}, 1000);
      }
      
      $('.message').keypress(function(event){
        if(event.keyCode == '13'){
          $.ajax({
            type:'post',
            url:'testController',
            data:{
              name: $('#user').val(),
              body: $('.message').val()
            }
          });

          $('.message').val(" ");
          receiveMessage();
        };
      });

      setInterval(function(){
        receiveMessage();
      },4000);
    })
  </script>
</body>
</html>