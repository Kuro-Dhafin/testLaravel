@extends('layouts.app')

@section('content')
<h2>Artists</h2>
@foreach($artists as $a)
    <div class="border p-2 mb-2">
        <a href="/artist/{{ $a->id }}"><strong>{{ $a->name }}</strong></a>
        <p>{{ $a->profile->speciality }}</p>
    </div>
@endforeach
{{ $artists->links() }}
@endsection
