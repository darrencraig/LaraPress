<ul>
    @foreach($articles as $article)
        <li>{!! $article->meta->subtitle !!}</li>
    @endforeach
</ul>