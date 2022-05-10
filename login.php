<html>
    <head>
        <title>ავტორიზაცია</title>
        <script src="assets/plugins/jquery/jquery.min.js"></script>
    </head>
    <body>
    <style>
    * {
  margin: 0;
}
html,
body {
  min-height: 100vh;
}
body {
  background: #232323;
  color: #fff;
  font-family: Helvetica, Arial, sans-serif;
}
.text-success {
  color: #28a745;
}
.text-danger {
  color: #dc3545;
}
.modal__background {
  height: 100vh;
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: box;
  display: flex;
  -webkit-box-pack: center;
  -moz-box-pack: center;
  -o-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -moz-box-align: center;
  -o-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}
.modal__window {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 29px;
  border: 1px solid #999;
  border-radius: 15px;
}
@media all and (min-width: 576px) {
  .modal__window {
    padding: 49px 79px 29px;
  }
}
.auth-form {
  display: -webkit-box;
  display: -moz-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: box;
  display: flex;
  -webkit-box-orient: vertical;
  -moz-box-orient: vertical;
  -o-box-orient: vertical;
  -webkit-flex-direction: column;
  -ms-flex-direction: column;
  flex-direction: column;
  letter-spacing: 1px;
}
.auth-form__label {
  margin-bottom: 40px;
  position: relative;
}
.auth-form__placeholder {
  position: absolute;
  color: #999;
  cursor: text;
  font-size: 16px;
  top: 9px;
  -webkit-transition: all 0.2s;
  -moz-transition: all 0.2s;
  -o-transition: all 0.2s;
  -ms-transition: all 0.2s;
  transition: all 0.2s;
}
.auth-form__placeholder.focus {
  top: -12px;
  font-size: 12px;
}
.auth-form__input {
  position: relative;
  width: 240px;
  height: 40px;
  background: transparent;
  color: #ccc;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  font-size: 16px;
  outline: none;
  border-top: none;
  border-left: none;
  border-right: none;
  border-bottom: none;
  -webkit-box-shadow: 0 1px 0 0 #666;
  box-shadow: 0 1px 0 0 #666;
}
.auth-form__input.focus {
  -webkit-box-shadow: 0 2px 0 0 #bbb;
  box-shadow: 0 2px 0 0 #bbb;
}
.auth-form__toggler,
.auth-form__icon,
.auth-form__checkbox {
  position: absolute;
  width: 18px;
  height: 18px;
}
.auth-form__checkbox {
  cursor: inherit;
}
.auth-form__toggler {
  cursor: pointer;
  right: 2px;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
  -o-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
.auth-form__icon {
  color: #666;
}
.auth-form__toggler:hover .auth-form__icon {
  color: #ccc;
}
.password-toggler {
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  filter: alpha(opacity=0);
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  border: none;
}
.auth-form__answer {
  height: 12px;
  padding-top: 4px;
  padding-bottom: 4px;
  font-size: 14px;
  text-align: center;
  margin-top: -10px;
  margin-bottom: 30px;
}
.auth-form__submit {
  font-family: inherit;
  font-size: inherit;
  letter-spacing: inherit;
  cursor: pointer;
  border: 1px solid #ccc;
  height: 50px;
  border-radius: 10px;
  background: transparent;
  color: #ccc;
  outline: none;
}
.auth-form__submit:hover {
  background: #fff;
  border: 1px solid #fff;
  color: #232323;
}
.auth-form__bottom {
  margin-top: 30px;
  font-size: 12px;
  color: #ddd;
  text-align: center;
}
.auth-form__bottom a {
  color: #007bff;
}
.auth-form__bottom a:hover {
  color: #ddd;
}
.hint {
  font-size: 12px;
  position: absolute;
  top: 10px;
  left: 10px;
}

    </style>
    <div class="modal__background">
    <div class="modal__window">

        <form class="auth-form" name="form-auth" method="post">

            <label class="auth-form__label">
                <span class="auth-form__placeholder">Username</span>
                <input class="auth-form__input input-email" type="text" name="email" autocomplete="off" required>
            </label>

            <label class="auth-form__label">
                <span class="auth-form__placeholder">Password</span>
                <input class="auth-form__input input-password" type="password" name="password" autocomlete="off" required>
                <div class="auth-form__toggler">
                    <i class="la la-eye auth-form__icon"></i>
                    <input type="checkbox" class="auth-form__checkbox password-toggler">
                </div>
            </label>

            <div class="auth-form__answer"></div>

            <input class="auth-form__submit" type="submit" value="Login">
            
            
        </form>

    </div>
</div>

<div class="hint"></div>
        <script>
        window.onload = function() {
            (function() {
                const inputText = document.querySelectorAll('.auth-form__input');

                inputText.forEach( function(input) {
                    input.addEventListener('focus', function() {
                        this.classList.add('focus');
                        this.parentElement.querySelector('.auth-form__placeholder').classList.add('focus');
                    });
                    input.addEventListener('blur', function() {
                        this.classList.remove('focus');
                        if (! this.value) {
                            this.parentElement.querySelector('.auth-form__placeholder').classList.remove('focus');
                        }
                    });
                });
            })();

            (function() {
                const togglers = document.querySelectorAll('.password-toggler');

                togglers.forEach( function(checkbox) {
                    checkbox.addEventListener('change', function() {

                        const toggler = this.parentElement,
                            input   = toggler.parentElement.querySelector('.input-password'),
                            icon    = toggler.querySelector('.auth-form__icon');

                        if (checkbox.checked) {
                            input.type = 'text';
                            icon.classList.remove('la-eye')
                            icon.classList.add('la-eye-slash');
                        }

                        else
                        {
                            input.type = 'password';
                            icon.classList.remove('la-eye-slash')
                            icon.classList.add('la-eye');
                        }
                    });
                });
            })();

            (function() {
                const validEmail = 'admin',
                    validPassword = '12345@';

                document.forms['form-auth'].addEventListener('submit', function(e) {
                    e.preventDefault();

                    const answerContainer = this.querySelector('.auth-form__answer'),
                        email = this.elements.email.value,
                        password = this.elements.password.value;

                    const placeholders = document.querySelectorAll('.auth-form__placeholder');
                    var that = this;
                    $.ajax({
                        url: "server-side/writes.action.php",
                        type: "POST",
                        data: {
                            act: "check_login",
                            login: email,
                            password: password
                        },
                        dataType: "json",
                        success: function(data) {
                            if(data.status == 'OK'){
                              answerContainer.innerHTML = '<span class="text-success">ავტორიზაცია წარმატებულია</span>';
                              location.reload();
                            }
                            else{
                              placeholders.forEach(function(placeholder) {
                                  placeholder.classList.remove('focus');
                              });
                              that.elements.email.value = '';
                              that.elements.password.value = '';
                              answerContainer.innerHTML = '<span class="text-danger">არასწორი ლოგინი ან პაროლი</span>';
                            }
                            
                        }
                    });
                });
            })();
        };
        </script>
    </body>
</html>