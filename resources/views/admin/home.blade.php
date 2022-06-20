@extends('layouts.app')

@section('content')
<div class="container p-5 mt-5 mb-5">
    <div class="row justify-content-center p-5 mt-5 mb-5">
        <div class="col-md-8 p-5 mt-5 mb-5 mx-auto">
            <div class="card mt-5 mb-5">
                <div class="card-header">{{ __('Bentornato') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __("Hai effettuato l'accesso alla dashboard") }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
