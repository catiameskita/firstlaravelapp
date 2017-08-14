@extends('layouts.admin')


@section('content')

    @if(Session::has('updated_category'))

        <p class="alert-info">{{session('updated_category')}}</p>

    @endif

    @if(Session::has('deleted_category'))

        <p class="alert-danger">{{session('deleted_category')}}</p>

    @endif


        <h1>Categories</h1>

        <div class="col-sm-3">
            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}
            <div class="form-group">
                    {!! Form::label('name','Name:')!!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                    {!! Form::submit('Create Category', null, ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>
<div class="col-sm-9">

    @if($categories)
     <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created Date</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
            <td>{{$category->created_at ? $category->created_at->diffForHumans(): 'no date'}}</td>
          </tr>
        @endforeach
        </tbody>
     </table>
    @endif
</div>


@stop