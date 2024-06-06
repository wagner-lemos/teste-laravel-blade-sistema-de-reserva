@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            @endif

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="card">
                <div class="card-header text-center">Faça sua reserva</div>

                <div class="card-body">
                    <form method="post" action="{{ route('reservation.create') }}" class="row g-3">
                        @csrf
                        <div class="col-6">
                            <label for="name" class="form-label">Seu Nome:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-6">
                            <label for="email" class="form-label">Seu E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-4">
                            <label for="date" class="form-label">Dia:</label>
                            <input type="date" class="form-control" id="date" name="date" required min="{{ date('Y-m-d') }}">
                        </div>
                        <div class="col-4">
                            <label for="start_time" class="form-label">Hora Início:</label>
                            <input type="time" class="form-control" id="start_time" name="start_time" required min="{{ date('H:i') }}">
                        </div>
                        <div class="col-4">
                            <label for="end_time" class="form-label">Hora Término:</label>
                            <input type="time" class="form-control" id="end_time" name="end_time" required min="{{ date('H:i') }}">
                        </div>
                        <div class="col d-flex justify-content-end">
                            <button type="submit" class="btn px-5" style="background: #00cfc0; color: #ffffff;">Efetuar Reserva</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
