<h2>Judul : </h2>
<p>{{$berita->judul}}</p>
<h2>Content : </h2>
<p>{{$berita->content}}</p>
<h2>Penulis : </h2>
<p>{{$berita->penulis}}</p>
<h2>tags : </h2>
@foreach ($tags as $item)
    <span class="badge badge-secondary">{{$item->nama}}</span>
@endforeach

