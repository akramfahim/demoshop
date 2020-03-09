@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h2>Category Edit</h2>
                  
                </div>

                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger" role="alert">
                          
                            @foreach ($errors->all() as $error)
                                  {{ $error }}
                            @endforeach
                          
                        </div>
                    @endif
                    @if (session('successMessage'))
                        <div class="alert alert-success" role="alert">
                            {{session('successMessage')}}
                        </div>
                    @elseif(session('errorMessage'))
                        <div class="alert alert-danger" role="alert">
                            {{session('errorMessage')}}
                        </div>
                    @endif

                    <form action="/category/{{$category[0]->id}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="categoryName"><h3>Category Name</h3></label>
                            <input type="text" name="categoryName" class="form-control mb-1" id="categoryName" value="{{$category[0]->categoryName}}">
                        </div>

                        <button class="btn btn-success">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>



@endsection
