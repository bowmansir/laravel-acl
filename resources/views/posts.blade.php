<html>
<h1>{{$post->title}}</h1>
@can('edit_form')
<a href="#">编辑</a>
@endcan
@can('update_form')
    <a href="#">更新</a>
@endcan
@can('cat_form')
    <a href="#">查看</a>
@endcan
</html>