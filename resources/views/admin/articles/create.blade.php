@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        @component('admin.components.breadcrumbs')

            @slot('title') Create Post @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories @endslot

        @endcomponent

        <hr>

        <form class="form-horizontal" action="{{route('admin.article.store')}}" method="post">
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.articles.partials.form')

            <input type="hidden" name="created_by" value="{{Auth::id()}}">
            
        </form>
    </div>

@endsection