@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1>Iglesias</h1>

        @include('iglesias.partials.table')
    </div>
</div>
@endsection