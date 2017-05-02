<div class="container">
        <div class="row">
            <div class="col-md-3 col-md-push-4">
                <div class="logo"><a href="index.html"><img src="{!!URL::to('storage/frontend/images/logo.png')!!}"  alt="Logo"></a></div>
            </div>
            <div class="col-md-4 col-md-pull-3">
                 <div class="call"><i class="fa fa-phone" aria-hidden="true"></i>Call us now +62 008 65 001</div>
            </div>
            <div class="col-md-5">
                 <div class="rightlinks">
                    <ul>
                        <li><a href="#" data-toggle="modal" data-target="#LoginModal"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#RegModal"><i class="fa fa-lock" aria-hidden="true"></i>Register</a></li>
                    </ul>
                    </div>
            </div>

            <!-- login Modal -->
            <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-user" aria-hidden="true"></i> USER LOGIN</h4>
                  </div>
                  <div class="modal-body">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="" type="text" class="loginuser" placeholder="User Id" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                        <input name="" type="password" class="loginuser" placeholder="Password" />
                      </div>
                      <br clear="all">
                      <div class="remindbox">
                          <input name="" type="checkbox" value="" /> &nbsp; Remember Me
                          <span><a href="#">Forgot Password?</a></span>
                      </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="viewmoreBTN">SIGNIN</button>
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
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-lock" aria-hidden="true"></i> Register</h4>
                  </div>
                  <div class="modal-body">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="" type="text" class="loginuser" placeholder="First Name" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-user" aria-hidden="true"></i></div>
                        <input name="" type="text" class="loginuser" placeholder="Last Name" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-envelope-open" aria-hidden="true"></i></div>
                        <input name="" type="text" class="loginuser" placeholder="Email" />
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-globe" aria-hidden="true"></i></div>
                        <select name="" class="countryreg">
                                <option value="Select Country">Select Country</option>
                                <option value="India">India</option>
                                <option value="India">India</option>
                            </select>
                      </div>
                      <br clear="all">
                      <div class="infbox">
                        <div class="userid"><i class="fa fa-phone-square" aria-hidden="true"></i></div>
                        <input name="" type="text" class="loginuser" placeholder="Phone" />
                      </div>
                      

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="viewmoreBTN">SIGN UP</button>
                  </div>
                </div>
              </div>
            </div>



        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="main_nav">
                <div class="container">
                    <div class="row">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Swasthya Bandhav</a></li>
                                <li><a href="services.html">Services</a></li>
                              </ul>                              
                              <ul class="nav navbar-nav navbar-right">
                                <li><a href="inquiry.html">Inquiry</a></li>
                                <li><a href="facilities.html">facilities</a></li>
                                <li><a href="doctors.html">doctors</a></li>
                                <li><a href="contact.html">contact us</a></li>                           
                              </ul>
                            </div>                          
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>