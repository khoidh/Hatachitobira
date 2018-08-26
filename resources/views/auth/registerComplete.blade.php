@extends('layouts.app')

@section('content')
	<h1>{{$message}} Click<a href="{{route('login')}}"> here</a> to login</h1>
@endsection