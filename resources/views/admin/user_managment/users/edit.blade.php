@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumbs')

            @slot('title') Edit User @endslot
            @slot('parent') Main @endslot
            @slot('active') Users @endslot
        @endcomponent

        <hr>

        <form class="form-horizontal" action="{{route('admin.user_managment.user.update', $user)}}" method="post">
            <input type="hidden" name="_method" value="put">
            {{ csrf_field() }}

            <label  for="">Username: <input class="form-control" type="text" value="{{$user->name}}"></label>
            <label  for="">Email: <input class="form-control" type="text" value="{{$user->email}}"></label>
            <label  for="">Password: <input class="form-control" type="password" value=""></label>

            <input type="hidden" name="modified_by" value="{{Auth::id()}}">

        </form>
    </div>

@endsection