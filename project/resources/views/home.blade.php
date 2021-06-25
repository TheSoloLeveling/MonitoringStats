@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <style> 
        nav{width: 0; height: 0;} 
        a{font-size: 0;}
        .animation{width: 0; height: 0;}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
    
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
    
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>

