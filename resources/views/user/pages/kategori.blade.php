@foreach ($categories as $category )
<li><a href="{{ route('shop.category', ['id' => $category->id]) }}"> {{ $category->nama_kategori }}<span class="number">09</span></a></li>
@endforeach
