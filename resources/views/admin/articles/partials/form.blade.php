<label for="">Satus</label>
<select class="form-control" name="published">
    @if (isset($article->id))
        <option value="0" @if ($article->published == 0) selected="" @endif>Not published</option>
        <option value="1" @if ($article->published == 1) selected="" @endif>Published</option>
    @else
        <option value="0">Not published</option>
        <option value="1">Published</option>
    @endif
</select>

<br>
<input type="text" class="form-control" name="title" placeholder="Title" value="{{$article->title or ""}}" required>
<br>
<input class="form-control" type="text" name="slug" placeholder="Auto generate" value="{{$article->slug or ""}}" readonly="">
<br>
<label for="">Parent Category</label>
<select class="form-control" name="categories[]" multiple="">
    <option value="0">-- without parent category --</option>
    @include('admin.articles.partials.categories', ['categories' => $categories])
</select>

<label for="">Description</label>
<textarea class="form-control" name="description">{{$article->description or ""}}</textarea>
<hr />

<input class="form-control" type="text" placeholder="Meta title" name="meta_title" value="{{$article->meta_title or ""}}">
<br>
<input class="form-control" type="text" placeholder="Meta description" name="meta_description" value="{{$article->meta_description or ""}}">
<br>
<input class="form-control" type="text" placeholder="Meta keywords" name="meta_keyword" value="{{$article->meta_keyword or ""}}">

<hr />

<input class="btn btn-primary" type="submit" value="Save">