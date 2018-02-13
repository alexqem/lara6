@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumbs')

            @slot('title') Users @endslot
            @slot('parent') Main @endslot
            @slot('active') Users @endslot

        @endcomponent

        <hr>

        <a href="{{route('admin.user_managment.user.create')}}" class="btn btn-primary pull-right"> Create new article</a>
        <table class="table table-striped">
            <thead>
            <th>Name</th><th>Email</th><th>Action</th>
            </thead>
            <tbody>
            @forelse ($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <form action="{{route('admin.user_managment.user.destroy',$user)}}"
                              method="post" onsubmit="
                                if(confirm('Are you sure to Delete?')) {
                                    return true } else {return false}">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <a href="{{route('admin.user_managment.user.edit', $user)}}" class="btn btn-default">Edit</a>
                            <button type="submit" class="btn btc-default"> Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>No data</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$users->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection