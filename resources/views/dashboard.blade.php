@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center text-black">Registro de Reservas</div>

                <div class="card-body">
                    @if(count($reservations) > 0)
                        
						@foreach($reservations as $key => $reservation)
							@php $bgClass = $key % 2 === 0 ? 'bg-light' : 'bg-white'; @endphp
							<div class="row {{$bgClass}}  py-3">
								<div class="col-4">
									<span>Nome: {{ $reservation->name }}</span><br/>
									<span>Email: {{ $reservation->email }}</span>
								</div>
								<div class="col-4 text-center">
									<span>Data Reserva: {{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y') }}</span>
								</div>
								<div class="col-4 text-end">
									<span>Hora Início: {{ $reservation->start_time }}</span>
									<br/>
									<span>Hora Término: {{ $reservation->end_time }}</span>
								</div>
							</div>
						@endforeach
                        
                    @else
                        <p class="text-center">Nenhuma reserva encontrada.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
