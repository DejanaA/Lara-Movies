<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">       <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/myStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        
    </head>
    <body>       
            <nav class="navbar navbar-default">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>

                      <a class="navbar-brand"  style="margin-left:20px;" href="{!!route ("WelcomePage") !!}">Pocetna</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                      <ul class="nav navbar-nav">
                        

                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Filmovi <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                           
                            @foreach ($genres as $genre)
                              <li><a style="color:black" href="{!!route('Movies',['id'=> $genre->name])!!}">{{$genre->name}}</a></li>
                            @endforeach
 
                          </li>   
                          </ul>
                        </li>
                        <li><a href="#">Najgledanije</a></li>
                        <li><a href="">Poslednje dodato</a></li>
                        

                      </ul>
                      <form class="navbar-form navbar-left" action="{!!route ("Search") !!}" method="GET">
                        <div class="form-group">
                          <input class="form-control mr-sm-2" name="keyword" type="text" placeholder="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </div>
                        
                      </form>
                      

                      @if (Auth::check())
                      <ul class="nav navbar-nav navbar-right" id="registration">
                        

                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>  Profile</a></li>
                            <li><a href="{!!route ("Logout") !!}">Logout</a></li>            
                          </ul>
                        </li>
                        </ul>
                        @else
                        <ul class="nav navbar-nav navbar-right" id="registration">
                        <li><a href="{!!route ("Registration") !!}">Registration</a></li>
                        <li><a href="{!!route ("Login") !!}">Login</a></li>
                      
                      </ul>
                        @endif
                      
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                  </nav>
                  <div class="container">
                   
                  @yield('centerSection')

                  

                
        </div>
        

    </body>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   
</html>
