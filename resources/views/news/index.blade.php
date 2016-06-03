<ul>
    @foreach($articles as $article)
        <li>{!! $article->post_title !!}</li>
    @endforeach
</ul>