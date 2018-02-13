@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumbs')

            @slot('title') Categories @endslot
            @slot('parent') Main @endslot
            @slot('active') This @endslot

        @endcomponent

        <hr>

        <a href="{{route('admin.category.create')}}" class="btn btn-primary pull-right"> Create new category</a>
        <table class="table table-striped">
            <thead>
                <th>Name</th><th>Published</th><th>Action</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->published}}</td>
                        <td>
                            <form action="{{route('admin.category.destroy',$category)}}"
                                method="post" onsubmit="
                                if(confirm('Are you sure to Delete?')) {
                                    return true
                                } else {return false}">
                                <input type="hidden" name="_method" value="DELETE">
                                {{csrf_field()}}
                                <a href="{{route('admin.category.edit', $category)}}" class="btn btn-default">Edit</a>
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
                            {{$categories->links()}}
                        </ul>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

@endsection