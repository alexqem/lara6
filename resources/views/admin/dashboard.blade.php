@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="/admin/вфcategory">
                    <div class="jumbotron text-center">
                        <p><span class="label label-primary">Categories {{$count_cat}}</span></p>
                    </div>
                </a>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Posts {{$count_articles}}</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Views 1</span></p>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="jumbotron text-center">
                    <p><span class="label label-primary">Views Today 1</span></p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('admin.category.create') }}">Create Сategory</a>
                @foreach ($categories as $category)
                    <a href="{{route('admin.category.edit', $category)}}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$category->title}}</h4>
                        <p class="list-group-item-text">{{$category->articles()->count()}}</p>
                    </a>
                @endforeach
            </div>
            <div class="col-sm-6">
                <a class="btn btn-block btn-default" href="{{ route('admin.article.create') }}">Create Post</a>
                    @foreach ($articles as $article)
                    <a href="{{ route('admin.article.edit', $article) }}" class="list-group-item">
                        <h4 class="list-group-item-heading">{{$article->title}}</h4>
                        <p class="list-group-item-text">{{$article->categories()->pluck('title')->implode(',')}}</p>
                    </a>
                    @endforeach
            </div>
        </div>
    </div>

@endsection