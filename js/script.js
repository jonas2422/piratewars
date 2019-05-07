var autoLoad = setInterval(
function ()
{
$.ajax({
  url: 'multiplayer/checkplayer.php',
  method: 'POST',
  success: function(data){
    if (data ==1) {
      $('.hidebeforemove').show();
      $('.showformove').hide();
    }
    else {

      $('.hidebeforemove').hide();
      $('.showformove').show();
    }
  }
});
}, 100);
$.fn.toggleClick = function(){
    var methods = arguments,
        count = methods.length;
    return this.each(function(i, item){
        var index = 0;
        $(item).click(function(){
            return methods[index++ % count].apply(this,arguments);
        });
    });
};
$(document).ready(function() {
    $('.settingsboard').hide();
      $('.shopinventory').hide();
    $('.shop').hide();
    $('.settingsbutton').toggleClick(function(){
      $('.settingsboard').show();
      $('.leaderboard').hide();
      $('.dahsboard').hide();
      $('.shopbutton').hide();
      $('.settingsbutton').html('Back');
    }, function(){
      $('.settingsboard').hide();
      $('.dahsboard').show();
      $('.leaderboard').show();
        $('.shopbutton').show();
      $('.settingsbutton').html('Settings');
    });
    $('.inv').toggleClick(function(){
      $('.leaderboard').hide();
      $('.shopinventory').show();
      $('.shopbutton').hide();
      $('.settingsbutton').hide();
      $('.inv').html('Back');
    }, function(){
      $('.leaderboard').show();
        $('.shopinventory').hide();
      $('.shopbutton').show();
      $('.settingsbutton').show();
      $('.inv').html('Inventory');
    })
    $('.shopbutton').toggleClick(function(){
      $('.shop').show();
      $('.leaderboard').hide();
      $('.dahsboard').hide();
      $('.settingsbutton').hide();
      $('.shopbut').html('Back');
    }, function(){
      $('.shop').hide();
      $('.dahsboard').show();
      $('.leaderboard').show();
      $('.settingsbutton').show();
      $('.shopbut').html('Shop');
    });
    var autoLoad = setInterval(
    function ()
    {
    $.ajax({
      url: 'includes/livemoney.php',
      method: 'POST',
      success: function(data){
        $('.amountofgold').html(data)
      }
    });
    $.ajax({
      url: 'includes/liveuser.php',
      method: 'POST',
      success: function(data){
        $('.liveuser').html(data)
      }
    });
    $.ajax({
      url: 'includes/livelvl.php',
      method: 'POST',
      success: function(data){
        $('#lvl').html('Level: ' + data)
      }
    });
    }, 1000);


    $('clickchangeuser').click(function(){
      var newuser = $('#ucheck').val();
      $.ajax({
        method: 'post',
        url: 'includes/changeusername.php',
        data: {newuser : newuser},
        success: function(){
          console.log('changed username');
        }
      })
    })
});

$(document).ready(function() {
    $('.updatesubmit').click(function(){
      var upemail ='';
      var uppassword ='';
      if (!$('.updateemail').val()) {
      }else {
        var upemail = $('.updateemail').val();
      }
      if (!$('.newpassword').val()) {
      }else {
        var uppassword = $('.newpassword').val();;
      }
      console.log(upemail);
      $.ajax({
        method: 'POST',
        url: 'includes/update.php',
        data: {
          upemail: upemail,
          uppassword: uppassword
        },
        success: function(data){
          $('.updated').html('Data updated');
        }
      })
    })
  });


  var canvas = document.getElementById("canvas");
  var context = canvas.getContext("2d");
  var view = {x: 0, y: 0};
  var questionsArray = [];
  var moveCount = 0;
  var moveCharacter = false;
  var moveBtns = document.getElementsByClassName("buttondirection");
    var loaddatax;
    var loaddatay;
    var loaddatax2;
    var loaddatay2;
 setInterval(function(){
      $.ajax({
        url : 'multiplayer/x.php',
        method : 'get',
        async : false,
        success: function(data){
          loaddatax = data;
        }
      })
      $.ajax({
        url : 'multiplayer/y.php',
        method : 'get',
        async : false,
        success: function(data){
          loaddatay = data;
        }
      })
      $.ajax({
        url : 'multiplayer/x2.php',
        method : 'get',
        async : false,
        success: function(data){
          loaddatax2 = data;
        }
      })
      $.ajax({
        url : 'multiplayer/y2.php',
        method : 'get',
        async : false,
        success: function(data){
          loaddatay2 = data;
        }
      })
    }, 500)
  var boatPosX = 100;
  var boatPosY = 200;
  var boatPosX2 = 100;
  var boatPosY2 = 270;

  var players1 = {
    gold: 0,
    pts: 0,
    positionX: boatPosX,
    positionY: boatPosY,
    //moveCharacter = false;
  }
  var players2 = {
    gold: 0,
    pts: 0,
    positionX: boatPosX2,
    positionY: boatPosY2,
    //moveCharacter = false;
  }

  var goldAmount = 0;
  var pointAmount = 0;
  var player1 = true;
  var player2 = false;
  $.ajax({
    url : "multiplayer/trueorfalse.php",
    method: 'post',
    data: {p1 : player1, p2 : player2},
    success: function(data){
      console.log(data);
    }
  })

  var theArray = [];
  /*var mapArray = [
    [0, 0, 0, 0, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 2, 2, 0],
    [0, 0, 1, 1, 1, 0, 0, 2, 0, 0],
    [0, 0, 1, 1, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 1, 1, 1, 1, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 1, 0, 0, 0, 0],
    [0, 0, 0, 0, 1, 1, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 2, 2, 0],
    [0, 0, 1, 1, 1, 0, 0, 2, 0, 0],
    [0, 0, 1, 1, 1, 0, 0, 0, 0, 0],
    [0, 0, 0, 1, 1, 0, 0, 0, 0, 0]
  ];
  */
  var mapArray = [
    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 3, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1],

  ];
  function isPositionWall(ptX, ptY) {
    var gridX = Math.floor(ptX / 36);
    var gridY = Math.floor(ptY / 36);
    if(mapArray[gridY][gridX] != 0) {
      return true;
    }
  }

  function foundGold(ptX, ptY) {
    var gridX = Math.floor(ptX / 36);
    var gridY = Math.floor(ptY / 36);
    if(mapArray[gridY][gridX] == 3) {
      mapArray[gridY][gridX] = 0;
      return true;
    }
  }

  var Question = function(question, answer1, answer2, correctAnswer) {
    this.question = question;
    this.answer1 = answer1;
    this.answer2 = answer2;
    this.correctAnswer = correctAnswer;

    this.addToArray = function(){
       theArray.push(this);
   };
    this.addToArray();
  }

  Question.prototype.checkAnswer = function(answer1, answer2) {
    if (answer1.innerHTML  == this.correctAnswer) {
      console.log("correct");
      questions.classList.remove("alert-danger");
      questions.style.display = "none";
      answerBtn1.style.display = "none";
      answerBtn2.style.display = "none";
      for(var i=0; i < moveBtns.length; i++) {
        moveBtns[i].style.display = "block";
      }
      moveCharacter = true;
      pointAmount+= 1;
      point.innerHTML = pointAmount;
    } else {
      $.ajax({
        url: 'multiplayer/swap.php',
        method: 'post',
        success: function(data){
          console.log('swap');
        }
      })
    moveCharacter = false;

        /*questions.className += " alert-danger";
      questions.style.display = "none";
      answerBtn1.style.display = "none";
      answerBtn2.style.display = "none";
      for(var i=0; i < moveBtns.length; i++) {
        moveBtns[i].style.display = "block";
      }*/
      console.log("nope")
    }
  }
var endgame = false;
var winner=1;

if (performance.navigation.type == 1) {
  console.info( "This page is reloaded" );
  $.ajax({
      url: 'multiplayer/removerow.php',
      async:false,
      success: function(data){
        window.location.href = 'dashboard.php';
        endgame = false;
        return false;
        winner = 3;
      }
  })
} else {
  console.info( "This page is not reloaded");
}
var checkrows = setInterval(function(){
  $.ajax({
      url: 'multiplayer/checkrows.php',
      success: function(data){
        console.log('checking');
        if (data == 'true') {
          console.log('playerleft');
          endGame();
          clearInterval(checkrows);
        }
      }
  })
},60000);


window.onbeforeunload = function(e) {
  $.ajax({
      url: 'multiplayer/removerow.php',
      async:false,
      success: function(data){
        window.location.href = 'dashboard.php';
        endgame = false;
        return false;
      }
  })
};
  function endGame() {
        $( ".dialogwin" ).dialog( "open" );
    if (window.performance) {
  console.info("window.performance works fine on this browser");
}
  if (performance.navigation.type == 1) {
    console.info( "This page is reloaded" );
    $.ajax({
        url: 'multiplayer/quit.php',
        async:false,
        success: function(data){
          window.location.href = 'dashboard.php';
          endgame = false;
          return false;
        }
    })
  } else {
    console.info( "This page is not reloaded");
  }
  window.onbeforeunload = function(e) {
    $.ajax({
        url: 'multiplayer/quit.php',
        async:false,
        success: function(data){
          window.location.href = 'dashboard.php';
          endgame = false;
          return false;
        }
    })
  };

    if (winner  == 1) {
      $.ajax({
        url : 'multiplayer/player1.php',
        method : 'get',
        async : false,
        success: function(data){
          var username = data;
          $('#winnername').html('Winner is ' + data + ' !');
          var amount = goldAmount + 50;
          $('#prizepool').html('250 +' + goldAmount + ' = ' + amount + ' Gold!');

            $.ajax({
              url : 'multiplayer/gold.php',
              method: 'post',
              data: {amount : amount, winner : winner, username : username},
              success: function(data){
              }
            })
        }
      })
    }else if (winner == 2) {
      $.ajax({
        url : 'multiplayer/player2.php',
        method : 'get',
        async : false,
        success: function(data){
          var username = data;
          $('#winnername').html('Winner is ' + data + ' !');
          var amount = goldAmount + 250;
          $('#prizepool').html('250 + ' + goldAmount + ' = ' + amount + ' Gold!');
            $.ajax({
              url : 'multiplayer/gold.php',
              method: 'post',
              data: {amount : amount, winner : winner, username : username},
              success: function(data){
              }
            })

        }
      })

    }else if (winner == 3){
      alert('Your opponent just left the match');
      $.ajax({
          url: 'multiplayer/quit.php',
          async:false,
          success: function(data){
            window.location.href = 'dashboard.php';
            endgame = false;
            return false;
          }
      })
    }
    endgame = false;
    $('.quitmatch').click(function(){
      $.ajax({
          url: 'multiplayer/quit.php',
          async:false,
          success: function(data){
            window.location.href = 'dashboard.php';
            endgame = false;
            return false;
          }
      })
    })
  }
   var intervaltrue = setInterval(function(){
     if (endgame == true) {
       clearInterval(intervaltrue);
      endGame();

    }
  },1000);

  var question1 = new Question("Which port on Jutland's west coast is an important industrial centre?", "Esbjerg", "Aarhus", "Esbjerg");
    var question2 = new Question("Of what Christian denomination are the majority of Danes?", "Lutheran", "Catholic", "Lutheran");
    var question3 = new Question("What body of water lies to the north of the Jutland peninsula?", "Skagerrak", "Baltic Sea", "Skagerrak");
    var question4 = new Question("Who was the Queen Consort of Denmark from 1935 until 1998?", "Ingrid", "Mary", "Ingrid");
    var question5 = new Question("What body of water lies to the west of Denmark?", "North Sea", "Skagerrak", "North Sea");
    var question6 = new Question("What is the name of the bridge that joins the Danish island of Sjaelland (Zealand) to Sweden?", "Oresund", "Nyborg", "Oresund");
    var question7 = new Question("The Danish flag is a white cross on a background of this color?", "Red", "Blue", "Red");

    var question8 = new Question("Hans Christian Andersen was born on this island?", "Funen", "Zealand", "Funen");
    var question9 = new Question("What is the name of the biggest lake in Denmark?", "Arresoe", "Furesoe", "Arresoe");
    var question10 = new Question("Who is the fictional 'Prince of Denmark'?", "Hamlet", "Rasmus", "Hamlet");
    var question11 = new Question("This port on Jutland's west coast is an important industrial centre?", "Esbjerg", "Aarhus", "Esbjerg");
  var StyleSheet = function(image, width, height, x, y) {
    this.image = image;
    this.width = width;
    this.height = height;
    this.x = x;
    this.y = y
    this.draw = function(image, sx, sy, swidth, sheight, x, y, width, height) {
      context.drawImage(image, sx, sy, swidth, sheight, x, y, width, height);
    };
    this.drawimage = function(image, x, y, width, height) {
      context.drawImage(image, x, y, width, height);
    };
  };

  /* Initial Sprite Position */



  console.log(Math.floor(boatPosX / 36));

  function render(viewport) {




    context.save();
  //  if(Math.floor(boatPosX / 36) < 10) {
      context.translate(view.x, view.y);
    //}
    //if(Math.floor(boatPosX / 36) == mapArray.length)

    requestAnimationFrame(render);

    var oldPosX = boatPosX;
    var oldPosY = boatPosY;

    var oldViewX = view.x;
    var oldViewY = view.y;

    for (let i = 0; i < mapArray.length; i++) {
      for (let j = 0; j < mapArray[i].length; j++) {

        if (mapArray[i][j] == 0 || 3) {
          this.sprite.draw(
            background,
            190,
            230,
            26,
            26,
            j * this.sprite.width,
            i * this.sprite.height,
            this.sprite.width,
            this.sprite.height
          );
        }
        if (mapArray[i][j] == 1) {
          this.sprite.draw(
            background,
            30,
            30,
            26,
            26,
            j * this.sprite.width,
            i * this.sprite.height,
            this.sprite.width,
            this.sprite.height
          );

        }
        if (mapArray[i][j] == 2) {
          this.sprite.draw(
            background,
            200,
            20,
            26,
            26,
            j * this.sprite.width,
            i * this.sprite.height,
            this.sprite.width,
            this.sprite.height
          );
        }
        if(Math.floor(boatPosX / 36) == mapArray[i].length - 2) {
          //console.log("finish");
          //boatPosX = Math.floor(mapArray[i].length * 36);
          moveCharacter = false;
          boatPosX = 580;
          endGame();
        }
      }
      //console.log(Math.floor(mapArray[i].length * 36));
    }

    this.ship.drawimage(boat, loaddatax, loaddatay, 50, 50);
    this.ship2.drawimage(boat2, loaddatax2, loaddatay2, 50, 50);
    if (view.x == -105) {
      view.x = -105;
    }
    //console.log(view.x)


    answerBtn1.innerHTML = theArray[moveCount].answer1;
    answerBtn2.innerHTML = theArray[moveCount].answer2;
    if(isPositionWall(boatPosX + 36, boatPosY)) {
      //boatPosX = oldPosY;
      console.log("collision");
    }

    if(foundGold(boatPosX + 36, boatPosY)) {
      goldAmount+= 1;
      gold.innerHTML = goldAmount;
    }

    context.beginPath();
  context.moveTo(630, 400);
  context.lineTo(630, 100);

  context.stroke();

    checkMoveCounter();
    //console.log(mapArray[Math.floor(boatPosX / 36)]);
    //console.log(mapArray[Math.floor(boatPosX / 36)][Math.floor(boatPosX / 36)]);

    //RENDER FUNCTION END

    if(Math.floor(loaddatax) >= 630 || loaddatax2 >= 630) {
      endgame = true;
      if (Math.floor(loaddatax) >= 630 ) {
        winner=1;
      }else if (loaddatax2 >= 630) {
        winner=2;
      }
    }

    context.restore();

  };
  console.log(theArray.length);

  var btn1 = document.getElementsByClassName("button1")[0];
  var btn2 = document.getElementsByClassName("button2")[0];
  var btn3 = document.getElementsByClassName("button3")[0];
  var btn4 = document.getElementsByClassName("button4")[0];
  var answerBtn1 = document.getElementsByClassName("answer1q")[0];
  var answerBtn2 = document.getElementsByClassName("answer2q")[0];

  console.log(theArray);

  answerBtn1.addEventListener("click", function(e) {
    theArray[moveCount].checkAnswer(answerBtn1, answerBtn2);
  });

  answerBtn2.addEventListener("click", function(e) {
    question1.checkAnswer(answerBtn2, answerBtn2);
  });


  btn1.addEventListener("click", function(e) {
    if(moveCount >= 10) {
      moveCount = 0;
    } else {
      moveCount++;
    }
    $.ajax({
      url : 'multiplayer/true.php',
      method : 'POST',
      success: function(t){
        if (moveCharacter == true) {
          //moveCount++;
          for(var i=0; i < moveBtns.length; i++) {
            moveBtns[i].style.display = "none";
          }
          questions.style.display = "block";
          answerBtn1.style.display = "inline-block";
          answerBtn2.style.display = "inline-block";
            questions.innerHTML = theArray[moveCount].question;
          if (t == 'false') {
            boatPosX -= 25;
            $.ajax({
              url : 'multiplayer/coordinates.php',
              method : 'POST',
              data : {x : boatPosX, y : boatPosY},
              success: function(){
                console.log('veikia insertas' + boatPosX);
              }
            })
          }if (t == 'true'){

            boatPosX2 -= 25;
            $.ajax({
              url : 'multiplayer/coordinates2.php',
              method : 'POST',
              data : {x2 : boatPosX2, y2 : boatPosY2},
              success: function(){
                console.log('veikia insertas' + boatPosX2);
              }
            })
          }
          //view.x -= 25;
          moveCharacter = false;
        }
      }
    })
    $.ajax({
      url: 'multiplayer/swap.php',
      method: 'post',
      success: function(data){
        console.log('swap');
      }
    })
  });
  btn2.addEventListener("click", function(e) {
    if(moveCount >= 10) {
      moveCount = 0;
    } else {
      moveCount++;
    }
        $.ajax({
          url : 'multiplayer/true.php',
          method : 'POST',
          success: function(t){
            if (moveCharacter == true) {
              //moveCount++;
              for(var i=0; i < moveBtns.length; i++) {
                moveBtns[i].style.display = "none";
              }
              questions.style.display = "block";
              answerBtn1.style.display = "inline-block";
              answerBtn2.style.display = "inline-block";
              questions.innerHTML = theArray[moveCount].question;
              if (t == 'false') {
                boatPosX += 40;
                $.ajax({
                  url : 'multiplayer/coordinates.php',
                  method : 'POST',
                  data : {x : boatPosX, y : boatPosY},
                  success: function(){
                    console.log('veikia insertas' + boatPosX);
                  }
                })
              }if (t == 'true'){

                boatPosX2 += 40;
                $.ajax({
                  url : 'multiplayer/coordinates2.php',
                  method : 'POST',
                  data : {x2 : boatPosX2, y2 : boatPosY2},
                  success: function(){
                    console.log('veikia insertas' + boatPosX2);
                  }
                })
              }
              view.x -= 5;
              moveCharacter = false;
            }
          }
        })
        $.ajax({
          url: 'multiplayer/swap.php',
          method: 'post',
          success: function(data){
            console.log('swap');
          }
        })
      });
  btn3.addEventListener("click", function(e) {
    if(moveCount >= 10) {
      moveCount = 0;
    } else {
      moveCount++;
    }
    for(var i=0; i < moveBtns.length; i++) {
      moveBtns[i].style.display = "none";
    }
    questions.style.display = "block";
    answerBtn1.style.display = "inline-block";
    answerBtn2.style.display = "inline-block";
      questions.innerHTML = theArray[moveCount].question;
    $.ajax({
      url : 'multiplayer/true.php',
      method : 'POST',
      success: function(t){
        if (moveCharacter == true) {
          //moveCount++;

          if (t == 'false') {
            boatPosY += 5;
            $.ajax({
              url : 'multiplayer/coordinates.php',
              method : 'POST',
              data : {x : boatPosX, y : boatPosY},
              success: function(){
                console.log('veikia insertas' + boatPosX);
              }
            })
          }if (t == 'true'){

            boatPosY2 += 5;
            $.ajax({
              url : 'multiplayer/coordinates2.php',
              method : 'POST',
              data : {x2 : boatPosX2, y2 : boatPosY2},
              success: function(){
                console.log('veikia insertas' + boatPosX2);
              }
            })
          }
          view.x -= 5;
          moveCharacter = false;
        }
      }
    })
    $.ajax({
      url: 'multiplayer/swap.php',
      method: 'post',
      success: function(data){
        console.log('swap');
      }
    })
  });
  btn4.addEventListener("click", function(e) {
    if(moveCount >= 10) {
      moveCount = 0;
    } else {
      moveCount++;
    }
    for(var i=0; i < moveBtns.length; i++) {
      moveBtns[i].style.display = "none";
    }
    questions.style.display = "block";
    answerBtn1.style.display = "inline-block";
    answerBtn2.style.display = "inline-block";
      questions.innerHTML = theArray[moveCount].question;
    $.ajax({
      url : 'multiplayer/true.php',
      method : 'POST',
      success: function(t){
        if (moveCharacter == true) {
        //  moveCount++;

          if (t == 'false') {
            boatPosY -= 5;
            $.ajax({
              url : 'multiplayer/coordinates.php',
              method : 'POST',
              data : {x : boatPosX, y : boatPosY},
              success: function(){
                console.log('veikia insertas' + boatPosX);
              }
            })
          }if (t == 'true'){

            boatPosY2 -= 5;
            $.ajax({
              url : 'multiplayer/coordinates2.php',
              method : 'POST',
              data : {x2 : boatPosX2, y2 : boatPosY2},
              success: function(){
                console.log('veikia insertas' + boatPosX2);
              }
            })
          }
          view.x -= 5;
          moveCharacter = false;
        }
      }
    })
    $.ajax({
      url: 'multiplayer/swap.php',
      method: 'post',
      success: function(data){
        console.log('swap');
      }
    })
  });


  function checkMoveCounter() {
    if(moveCount >= theArray.length) {
      moveCount = 0;
    }
  }


  function move(e) {
    if (e.keyCode == 39) {
      if (moveCharacter == true) {
      if(moveCount >= 14) {
        moveCount = 0;
      } else {
        moveCount++;
      }
      if (player1 == true) {
        boatPosX += 5;
        player1 = false;
        player2 = true;
        moveCharacter = false;
    } else if(player2 == true) {
        boatPosX2 += 5;
        player2 = false;
        player1 = true;
    }
      //canvas.width += 2;
      if (view.x == -105) {
        view.x = -105;
      } else {
      view.x -= 5
    }
  }
      //moveCount++;
      console.log(moveCount);
      console.log("right");
    }
    if (e.keyCode == 37) {
      if (moveCharacter == true) {
      if(moveCount >= 14) {
        moveCount = 0;
      } else {
        moveCount++;
      }
      if (player1 == true) {
        boatPosX -= 5;
        player1 = false;
        player2 = true;
        moveCharacter = false;
    } else if(player2 == true) {
        boatPosX2 -= 5;
        player2 = false;
        player1 = true;
    }
      //canvas.width += 2;
      if (view.x == -105) {
        view.x = -105;
      } else {
      view.x += 5
    }
  }
    }
    if (e.keyCode == 38) {
      if (moveCharacter == true) {
      if(moveCount >= 14) {
        moveCount = 0;
      } else {
        moveCount++;
      }
      if (player1 == true) {
        boatPosY -= 5;
        player1 = false;
        player2 = true;
        moveCharacter = false;
    } else if(player2 == true) {
        boatPosY2 -= 5;
        player2 = false;
        player1 = true;
    }

      /*if (view.y == -105) {
        view.y = -105;
      } else {
      view.y -= 5
    }*/
  }
    }
    if (e.keyCode == 40) {
      if (moveCharacter == true) {
      if(moveCount >= 14) {
        moveCount = 0;
      } else {
        moveCount++;
      }
      if (player1 == true) {
        boatPosY += 5;
        player1 = false;
        player2 = true;
        moveCharacter = false;
    } else if(player2 == true) {
        boatPosY2 += 5;
        player2 = false;
        player1 = true;
    }

      /*if (view.y == -105) {
        view.y = -105;
      } else {
      view.y -= 5
    }*/
  }
    }
  }

  document.onkeydown = move;

  var background = new Image();
  background.src = "ground.png";
  var sprite = new StyleSheet(background, 36, 36, 16, 16);

  var boat = new Image();
  var boat2 = new Image();
  var pic1 = '';
  var pic2 = '';
  $.ajax({
    method: 'get',
    url : 'multiplayer/boat1.php',
    async: false,
    success: function(data){
      pic1 = data;
    }
  })
  $.ajax({
    method: 'get',
    url : 'multiplayer/boat2.php',
    async: false,
    success: function(data){
      pic2 = data;
    }
  })
  boat.src = pic1 + ".png";
  boat2.src = pic2 + ".png";
  var ship = new StyleSheet(boat, 36, 36, 16, 16);
  var ship2 = new StyleSheet(boat2, 36, 36, 16, 16);
  console.log(mapArray[Math.floor(boatPosX / 36)]);

  var goldContainer = document.getElementById("gold_amount");
  var gold = document.createElement('p');
  gold.innerHTML = goldAmount + ' ' +  "<img src=\"../ingot.svg\">";
  goldContainer.appendChild(gold);


  var pointContainer = document.getElementById("point_amount");
  var point = document.createElement('p');
  point.innerHTML = pointAmount;
  pointContainer.appendChild(point);


  var question_box = document.getElementById("question_box");
  var refChild = document.getElementsByClassName("answer1q")[0];
  var questions = document.createElement("p");
  questions.className = "question-text";
  questions.className += " alert";
  questions.className += " alert-success";
  question_box.appendChild(questions);
  question_box.insertBefore(questions, refChild);

  questions.innerHTML = theArray[moveCount].question;


  //console.log(mapArray[Math.floor(boatPosX / 36)][Math.floor(boatPosX / 36)]);




  render();
