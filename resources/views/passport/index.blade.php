@extends('layouts.app')
@section('content')
    <head>
    </head>
      <div id="app">
        <div class="flex-center position-ref full-height">
          <div class="content">
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
          </div>
        </div>
      </div>
@endsection
