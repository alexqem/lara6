@foreach ($categories as $cat)
    @if ($cat->children->where('published', 1)->count())
        <li class="dropdown">
            <a href="{{url("/blog/category/$cat->slug")}}" class="dropwodn-toggle"
            data-toggle="dropdown" role="button" aria-expanded="false"> {{$cat->title}} <span class="caret"></span> </a>
            <ul class="dropdown-menu" role="menu">
                @include('layouts.top_menu', ['categories' =>$cat->children])
            </ul>
    @else
        <li>
            <a href="{{url("/blog/category/$cat->slug")}}">{{$cat->title}}</a>
    @endif
        </li>
@endforeach