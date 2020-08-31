<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>food delivery</title>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <main class="py-4">
        <div>
        <strong>All Restaurants</strong>
            <a href="customers/register" class="btn btn-info" style="float:right">Login</a>
        </div>
           <div class="row">
               <div class="card-group">
                    @forelse ($restaurants as $restaurant)
                    <div class="col-sm-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ URL::asset('/photos/'. $restaurant->photos) }}" alt="Card image cap" >
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{route('foodDelivery.show', $restaurant->id)}}" style="text-decoration: none"> {{$restaurant->name}}</a></h5>
                
                                        <p class="card-text">
                                            Available Food category:{{$restaurant->food_category->name}}
                                        </p>
                                </div>
                        </div>               
                    </div>     
               </div>           
                    @empty    
                    @endforelse 
            </div>      
</main>
</body>
{{-- href="{{route('foodDelivery.detail', $restaurant->id)}}" --}}
{{-- {{route('customers.register')}} --}}
</html>




