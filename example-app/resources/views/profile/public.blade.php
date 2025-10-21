
@extends('layouts.app')

@section('content')
<h2>{{ $artist->name }}</h2>
<p>{{ $artist->profile->bio }}</p>
<p>Speciality: {{ $artist->profile->speciality }}</p>
<p>
    @if($artist->profile->portfolio_link)
        <a href="{{ $artist->profile->portfolio_link }}" target="_blank">Portfolio</a><br>
    @endif
</p>

<h3>Services by {{ $artist->name }}</h3>
@foreach($artist->services as $s)
    <div>
        <a href="/services/{{ $s->id }}">{{ $s->title }}</a>
    </div>
@endforeach
@endsection
