<div class="container">
        <div class="row">
            <div class="col-md-3 col-md-push-4">
                <div class="logo"><a href="{!!URL::to('/')!!}"><img src="{!!URL::to('storage/frontend/images/logo.png')!!}"  alt="Logo"></a></div>
            </div>
            <div class="col-md-4 col-md-pull-3">
                 <div class="call"><i class="fa fa-phone" aria-hidden="true"></i>Call us now +62 008 65 001</div>
            </div>
            <div class="col-md-5">
                 <div class="rightlinks">
                   @if(Auth::guard('front')->check())
                     <img src="{!! Auth::guard('front')->user()->thumb() !!}" alt=""> Welcome Mr. {{ Auth::guard('front')->user()->last_name }},
                     <a href="/patient-logout" class="logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                   @else
                     <ul>
                         <li><a href="#" data-toggle="modal" data-target="#LoginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                         <li><a href="#" data-toggle="modal" data-target="#RegModal"><i class="fa fa-lock" aria-hidden="true"></i>Register</a></li>
                     </ul>
                   @endif

                    </div>
            </div>

            <!-- login Modal -->
            <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user" aria-hidden="true"></i> USER LOGIN</h4>
                    <h4 class="login" style="display:none;"></h4>
                  </div>
                  <form name="frmLogin" id="frmLogin" method="post">
                  <div class="modal-body">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="login_email_id" id="login_email_id" type="text" class="loginuser" placeholder="Enter Email ID" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                        <input name="login_password" id="login_password" type="password" class="loginuser" placeholder="Enter Password" />
                      </div>
                      <br clear="all">
                      <div class="remindbox">
                          <input name="remember_me" type="checkbox" value="1" /> &nbsp; Remember Me
                          <span><a href="javascript:void(0)">Forgot Password?</a></span>
                      </div>

                  </div>
                </form>
                  <div class="modal-footer">
                    <button type="button" class="viewmoreBTN" id="btnLogin">SIGNIN</button>
                  </div>
                </div>
              </div>
            </div>


            <!-- Register Modal -->
            <div class="modal fade" id="RegModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-lock" aria-hidden="true"></i> Patient Registration</h4>
                    <h4 class="registration" style="display:none;"></h4>
                  </div>
                  <form name="frmRegistration" id="frmRegistration" method="post" >
                  <div class="modal-body">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="first_name" id="first_name" type="text" class="loginuser" placeholder="Enter First Name" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="last_name" id="last_name" type="text" class="loginuser" placeholder="Enter Last Name" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-envelope-open" aria-hidden="true"></i></div>
                        <input name="email_id" id="email_id" type="text" class="loginuser" placeholder="Enter Email ID" />
                      </div>
                      <br clear="all">

                      <div class="infbox">
                        <div class="userid"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                        <input name="mobile_no" id="mobile_no" type="text" class="loginuser" maxlength="10" placeholder="Enter Mobile No" />
                      </div>

                      <br clear="all">

                      <div class="infbox">
                        <div class="userid"><i class="fa fa-key" aria-hidden="true"></i></div>
                        <input name="password" id="password" type="password" class="loginuser" placeholder="Enter Password" />
                      </div>

                  </div>
                </form>
                  <div class="modal-footer">
                    <button type="button" class="viewmoreBTN" id="btnRegistration">SIGN UP</button>
                  </div>
                </div>
              </div>
            </div>



        </div>
    </div>
