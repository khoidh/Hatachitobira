<div id="modal_login" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 style="border-bottom: 1px solid #ddd;padding-bottom: 11px;" class="modal-title" style="text-align:center">Login</h3>
                <div class="panel-body">
                    <span class="error-login" style="color:red;font-size:16px;"></span>
                    <form class="form-horizontal" id="form-login">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-register  btn-register-btn-1" id="btnlogin">
                                    Login
                                </button>
                            </div>
                            <div class="col-md-12">
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>


                    </form>    
                    <div class="form-group">
                        <div class="col-md-12">
                            <a href="{{ url('/auth/facebook') }}" class="btn btn-primary btn-register"><i class="fa fa-facebook"></i> Facebook</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>   
</div>

<div id="modal_register" class="modal fade modal_register" role="dialog">
    <div class="modal-dialog" style="margin-top:150px">
        <div class="modal-content">
            <div class="modal-body" style="text-align:center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="panel-body">

                </div>
            </div>
        </div>
    </div>   
</div>
<meta name="_token" content="<?=csrf_token()?>">
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
    });

     $(document).on('click','.show-modal-register',function(e){
        e.preventDefault();
        $html = '';
        $html +='<div class="form-group code-top">';
            $html +='<div class="col-md-5">';
            $html +='<p class="title-register">イベント参加・個人ページの利用は会員限定です。さあ、マイテーマを探そ。</p>';
            $html +='</div>';
            $html +='<img src="{{ asset("image/picture1.png") }}">';
        $html +='</div>';
        $html +='<div class="form-group">';
                $html +='<span id="first-name-err" style="color:red;font-size:12px" ></span>';
            $html +='<div class="col-md-10 col-md-offset-1" style="text-align: left;">';
                $html +='<input class="input-checkbox"  type="checkbox" id="input-check-required">';
                $html +='<label class="lblcheckbox"><a class="link-redirect" href="/private-polisy">利用規約</a> と <a class="link-redirect" href="/private-polisy">プライバシーポリシー</a> に同意する </label>';
            $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
            $html +='<div class="col-md-12">';
                $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
            $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
            $html +='<div class="col-md-12">';
                $html +='<a href="#" class="btn btn-success btn-register btn-register-btn"> メールアドレスで登録</a>';
            $html +='</div>';
        $html +='</div>';

        $('#modal_register').find('.panel-body').html($html);
        $('#modal_register').modal("show");

    });

    $(document).on('click','#btnlogin',function(e){
        e.preventDefault();
        var email = $(this).parents('#form-login').find("#email").val();
        var password = $(this).parents('#form-login').find("#password").val();
        var url = "{{URL::to('user-login') }}";
        if ($.trim(email) == ''){
            $('.error-login').text("Please enter your username");
            return false;
        }
        if ($.trim(password) == ''){
            $('.error-login').text("Please enter your password");
            return false;
        }
        $.ajax({
            url : url,
            type: 'post',
            dataType: 'json',
            data:{
                email :email,
                password :password
            },
            success : function (result){
                console.log(result)
                if(result.status){
                    window.location.reload();
                }else{
                    $('.error-login').text(result.message);
                }
            }
        });
    });
    $(document).on('click','.btn-register.btn-register-btn',function(e){
        e.preventDefault();
        $html = '<h4 style="border-bottom: 1px solid #ddd;padding-bottom: 11px;"> Register </h4>';
        $html += '<span class="error-register" style="color:red;font-size:16px;"></span>';
        $html += '<div class="form-group">';
        $html +='<div class="col-md-12">';
        $html +='<input id="name" type="text" class="form-control" name="name" value="" required autofocus placeholder="Name">';
        $html +='</div>';
        $html +=' </div>';
        $html +='<div class="form-group">';
        $html +='<div class="col-md-12">';
        $html +='<input id="email" type="email" class="form-control" name="email" value="" required placeholder="Email Address">';
        $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
        $html +='<div class="col-md-12">';
        $html +='<input id="password" type="password" class="form-control" name="password" required placeholder="Password">';
        $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
        $html +='<div class="col-md-12">';
        $html +='<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Password Confirm">';
        $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
        $html +='<div class="col-md-12">';
        $html +='<button type="submit" class="btn btn-primary btn-submit-register btn-register btn-register-btn-1">';
        $html +='Register';
        $html +='</button>';
        $html +='</div>';
        $html +='</div>';
        $html +='<div class="form-group">';
        $html +='<div class="col-md-12">';
            $html +='<a href="{{ url("/auth/facebook") }}" class="btn btn-primary btn-register"> Facebookで登録</a>';
        $html +='</div>';
        $html +='</div>';

        $('#modal_register').find('.panel-body').addClass('form-horizontal');
        $('#modal_register').find('.panel-body').html($html);
        $('#modal_register').find('.panel-body').css('display','block');
    });

    $(document).on('click','.btn-submit-register',function(e) {
        e.preventDefault();
        var name = $(this).parents('#modal_register').find("#name").val();
        var email = $(this).parents('#modal_register').find("#email").val();
        var password = $(this).parents('#modal_register').find("#password").val();
        var repassword = $(this).parents('#modal_register').find("#password-confirm").val();
        var url = "{{URL::to('user-register') }}";
        $.ajax({
            url : url,
            type: 'post',
            dataType: 'json',
            data:{
                name : name,
                email :email,
                password :password,
                password_confirmation: repassword
            },
            success : function (result){
                $html = '<div class ="form-register-last">'
                $html += '<div class="form-group">';
                $html +='<h3>会員登録が完了しました!</h3>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">マイテーマを探すために、</label>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">気になる動画の収集や、個人の活動の記録を</label>';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html +='<label for="name" class="control-label">管理していきましょう。</label>';
                $html +=' </div>';
                $html += '<div class="form-group" style="margin-bottom: 28px; margin-top: 30px;">';
                $html +='<img class="image-register" src="{{ asset("image/register_1.png") }}">';
                $html +=' </div>';
                $html += '<div class="form-group">';
                $html += '<div class="col-md-12">'
                $html +='<a  class="btn btn-warning" href="{{route("mypage.index")}}">MY PAGEへ</a>';
                $html +=' </div>';
                $html +=' </div>';
                $html +=' </div>';
                $('#modal_register').find('.panel-body').addClass('form-horizontal');
                $('#modal_register').find('.panel-body').html($html);
            },
            error: function (request, status, error) {
                json = $.parseJSON(request.responseText);
                var texxt = '';
                $.each(json.errors, function(key, value){
                    texxt = texxt + '<p>'+value+'</p>';
                });
                console.log(texxt);
                $('.error-register').html(texxt);
                // $("#result").html('');
            }
        });
    });

    $(document).on('click','.btn.btn-primary.btn-register',function(e){
        e.preventDefault();
        if($('#input-check-required').is(':checked')) {
            window.location = $(this).attr('href');
        }
        else {
            $('#first-name-err').text('This input is required');
        }
    });
</script>


