@extends('layouts.app')

@if(Session::has('flash_message'))
<div class='alert alert-success'>
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span aria-hidden="true">&times;</span>
    </button>
    {{Session::get('flash_message')}}
</div>
@endif

@section('content')
    <div class="container">
        <div class="row">
            

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit botConfig #{{ $botconfig->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/home') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::model($botconfig, [
                            'method' => 'PATCH',
                            'url' => ['/bot-config/'.$botconfig->id.'/'.$form_action],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('bot-configs.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('js/utils.js') }}"></script>
<script src="{{ asset('js/auto-complete.js') }}"></script>
<script src="{{ asset('js/initiate-auto-complete.js') }}"></script>
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@endsection

