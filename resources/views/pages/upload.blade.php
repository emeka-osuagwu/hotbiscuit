@extends('master')

@section('content')
  
  <form action="{{ Url('magic_route_only_anakle_can_see') }}"  method="post">
      <button>Upload</button>
  </form>

@endsection