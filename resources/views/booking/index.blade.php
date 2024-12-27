@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <div class="card-header">
                    {{ __('Booking') }}
                    <a href="{{ route('booking.create') }}" class="btn btn-success" title="Booking">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Pelanggan</th>
                                <th>Nama Lapangan</th>
                                <th>Tanggal Booking</th>
                                <th>Waktu Mulai</th>
                                <th>Waktu Selesai</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $s)
                            <tr>
                                <td>{{$s->pelanggan?->nama}}</td>
                                <td>{{$s->lapangan?->nama}}</td>
                                <td>{{$s->tgl_booking}}</td>
                                <td>{{$s->waktu_mulai}}</td>
                                <td>{{$s->waktu_selesai}}</td>
                                <td>{{$s->total_harga}}</td>
                                <td>{{$s->status}}</td>
                                <td>
                                    <a href="{{ route('booking.edit', $s->id) }}" class="btn btn-warning" title="Edit Booking">Edit</a>
                                    <form action="{{ route('booking.destroy', $s->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Delete Booking">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
