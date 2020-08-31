<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <form class="pure-form pure-form-stacked"method="post">
        @csrf
    

      <div class="mask rgba-gradient align-items-center">
      
        <div class="container">
         
          <div class="row mt-15">
            
            <div class="col-md-6 col-xl-5 mb-4">
              <!--Form-->
              <div class="card wow fadeInRight">

                <div class="card-body">
           
                  <div class="text-center">
                    <h3 class="text text-white">
                      <i class="fa fa-user text text-white"></i> Login</h3>
                    <hr class="hr-light">
                  </div>

                  <div class="md-form">
                    <i class="fa fa-envelope prefix active text text-white "></i>
                    <input type="email"  class=" form-control" name="email">
                    <label for="form2" class="active">Your email</label>
                  </div>

                  <div class="md-form">
                    <i class="fa fa-lock prefix active  text text-white"></i>
                    <input type="password"  class=" form-control" name="password">
                    <label for="form4">Your password</label>
                  </div>

                  <div class="text-center mt-4">

                    <button class="btn btn-primary">Login</button>
                    <hr class="hr-light mb-3 mt-4">
                  
                    <div class="inline-ul text-center">
                        <a class="p-2 m-2 tw-ic">
                          <i class="fa fa-twitter text text-white"></i>
                        </a>
                        <a class="p-2 m-2 li-ic">
                          <i class="fa fa-linkedin text text-white"> </i>
                        </a>
                        <a class="p-2 m-2 ins-ic">
                          <i class="fa fa-instagram text text-white"> </i>
                          <p>Don't have an account yet? <a href="/users/registeration">Register here</a></p>
                        </a>
                    </div>

                  </div>

                </div>

              </div>
            
            </div>
            
          </div>
        
        </div>
     
      </div>
     
    </form>
</body>
</html>