<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- provide the csrf token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Employee</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                </div>
                <div class="row">
                    <div class="span12">
                        <div class="" id="loginModal">
                            <div class="modal-body">
                                <div class="well">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#login" data-toggle="tab">Employee</a></li>
                                        <li><a href="#create" data-toggle="tab">Employer</a></li>
                                    </ul>
                                    <form class="form-horizontal" action='' method="POST">
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane active in" id="login">
                                                    <div class="control-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                        <!-- Username -->
                                                        <label class="control-label"  for="username">Username/Email</label>
                                                        <div class="controls">
                                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="control-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                        <!-- Password-->
                                                        <label class="control-label" for="password">Password</label>
                                                        <div class="controls">
                                                            <input id="password" type="password" class="form-control" name="password" required>
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>             
                                        </div>
                                        <div class="tab-pane fade" id="create">
                                            <div class="control-group form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                    <!-- Username -->
                                                    <label class="control-label"  for="username">Username/Email</label>
                                                    <div class="controls">
                                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                                        @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="control-group form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                    <!-- Password-->
                                                    <label class="control-label" for="password">Password</label>
                                                    <div class="controls">
                                                        <input id="password" type="password" class="form-control" name="password" required>
                                                        @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Login</button><br/><br/>
                                            <a href="redirect/google" class="btn btn-warning">Login in with Google</a>
                                            <a href="redirect/facebook" class="btn btn-warning">Login in with Facebook</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>	
                    </div>
            <div class="col-lg-12">
                <div class="links">
                    <?php 
                    use App\JobPosition;
                    ?>
                    <form>
                        <select name="position" class="form-control positionValue" required="required">
                            <option value="">Select Position..</option>
                            <?php 
                             $jobData= JobPosition::all()->toArray();
                            ?>
                            @foreach($jobData as $jobDat)
                                <option value="{{$jobDat['location_id']}}">{{$jobDat['title']}}</option>
                            @endforeach

                        </select>
                        <select name="position" class="form-control" required="required">
                            <option value="">Select Position..</option>
                        </select>
                        <select name="position" class="form-control" required="required">
                            <option value="">Select Position..</option>
                        </select>
                        <button type="submit" class="btn btn-primary">Find Jobs</button>
                    </form>
                </div>
            </div>    
        </div>
            
    </body>
    <script type="text/javascript">
        $(document).ready(function(){
           $('.positionValue').change(function() {
               var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
               alert(CSRF_TOKEN);
                    $.ajax({
                        url: '/social/fetchLocation',
                        type: 'POST',
                        dataType : 'json', 
                        data: { _token:CSRF_TOKEN, location_id: this.value },
                        success: function(data) {
                            
                        }
                    });
           });
           
        });
    </script>
</html>
