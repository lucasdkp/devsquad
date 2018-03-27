@extends('layouts.app')

@section('content')
  <dashboard v-bind:dados="{{ json_encode($dados) }}"></dashboard>
@endsection
