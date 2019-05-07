$(function(){
  $.validator.addMethod('strong', function(value, element){
    return this.optional(element)
    || value.length >= 6;
  }, 'Your password must be at least 6 characters long');
  $.validator.addMethod('strongUser', function(value, element){
    return this.optional(element)
    || value.length >= 4;
  }, 'Your username must be at least 4 characters long');
  $(".changenameform").validate({
    rules: {
      newuser : {
        strongUser: true,
        remote: {
          url: "includes/checkuser.php",
          type: "post",
          data: {
            ex : function(){
              return $('#ucheck').val()
            }
          }
        }
      }
    },
    messages: {
      newuser: {
        remote: '*This username already exists'
      }
    }
  })
  $(".updateform").validate({
    rules: {
      signemail : {
        email: true,
        required: true,
        remote: {
          url: "includes/existingemail.php",
          type: "post",
          data: {
            ex : function(){
              return $('.updateemail').val()
            }
          }
        }
      },
      newpassword: {
        required: true,
        strong: true
      },
      newpasswordtwo: {
        required: true,
        equalTo: ".newpassword"
      },
      oldpassword:{
        required: true,
        nowhitespace: true,
        remote: {
          url: "includes/passwordcheck.php",
          type: "post",
          data: {
            ex : function(){
              return $('.oldpassword').val()
            },
            em : function(){
              return $('.oldemail').val()
            }
          }
        }
      }
    },
    messages: {
      signemail: {
        remote: 'This email already exists'
      },
      oldpassword:{
        remote: 'Your password is wrong'
      }
    }
  });
  $("#register").validate({
    rules: {
      email: {
        required: true,
        email: true,
        remote: {
          url: "includes/existingemail.php",
          type: "post",
          data: {
            ex : function(){
              return $('.emailcheck').val()
            }
          }
        }
      },
      password: {
        required: true,
        strong: true,
        nowhitespace: true
      },
      passwordtwo: {
        required: true,
        equalTo: "#passwordid"
      },
      username: {
        required: true,
        nowhitespace: true,
        strongUser: true,
        remote: {
          url: "includes/existinguser.php",
          type: "post",
          data: {
            ex : function(){
              return $('.usercheck').val()
            }
          }
        }
      }
    },
    messages: {
      passwordtwo: {
        equalTo: "Passwords do not match"
      },
      email: {
        remote: "Email already exists"
      }
    }
});
$("#login").validate({
  rules:{
    signemail:{
      required: true,
      email: true,
      remote: {
        url: "includes/loginemail.php",
        type: "post",
        data: {
          ex : function(){
            return $('.loginemail').val()
          }
        }
      }
    },
    password:{
      required: true,
      remote: {
        url: "includes/passwordcheck.php",
        type: "post",
        data: {
          ex : function(){
            return $('.loginpassword').val()
          },
          em : function(){
            return $('.loginemail').val()
          }
        }
      }
    }
  },
  messages: {
    signemail: {
      remote: 'Wrong email address'
    },
    password:{
      remote: 'Your password is wrong'
    }
  }
});
});
