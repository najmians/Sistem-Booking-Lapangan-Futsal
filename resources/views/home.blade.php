@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">{{ __('Home - Booking Lapangan Futsal') }}</div>

                <div class="card-header d-flex justify-content-center flex-wrap gap-2">
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-success m-1" title="Pelanggan">Pelanggan</a>
                    <a href="{{ route('lapangan.index') }}" class="btn btn-success m-1" title="Lapangan">Lapangan</a>
                    <a href="{{ route('foto_lapangan.index') }}" class="btn btn-success m-1" title="Foto Lapangan">Foto Lapangan</a>
                    <a href="{{ route('jadwal_lapangan.index') }}" class="btn btn-success m-1" title="Jadwal Lapangan">Jadwal Lapangan</a>
                    <a href="{{ route('kategori.index') }}" class="btn btn-success m-1" title="Kategori">Kategori</a>
                    <a href="{{ route('booking.index') }}" class="btn btn-success m-1" title="Booking">Booking</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="text-center mt-4">
    <p>&copy; {{ date('Y') }} Booking Lapangan Futsal - By. Najmi Annisa</p>
</footer>
@endsection
