@extends('layouts.app')

@section('content')
<h2>Edit Artist Profile</h2>
<form method="POST" action="/profile/update">
@csrf
<textarea name="bio" class="form-control mb-2" placeholder="Bio">{{ $profile->bio ?? '' }}</textarea>
<input name="speciality" class="form-control mb-2" placeholder="Speciality" value="{{ $profile->speciality ?? '' }}">
<input name="portfolio_link" class="form-control mb-2" placeholder="Portfolio URL" value="{{ $profile->portfolio_link ?? '' }}">
<input name="instagram" class="form-control mb-2" placeholder="Instagram" value="{{ $profile->instagram ?? '' }}">
<input name="twitter" class="form-control mb-2" placeholder="Twitter" value="{{ $profile->twitter ?? '' }}">
<input name="artstation" class="form-control mb-2" placeholder="Artstation" value="{{ $profile->artstation ?? '' }}">
<button class="btn btn-primary">Save</button>
</form>
@endsection
