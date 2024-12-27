@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Jadwal Lapangan') }}
                    <a href="{{ route('jadwal_lapangan.create') }}" class="btn btn-success" title="Buat Jadwal Lapangan">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Lapangan</th>
                                <th>Tanggal Sedia</th>
                                <th>Slot Waktu</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal_lapangans as $s)
                            <tr>
                                <td>{{$s->lapangan?->nama}}</td>
                                <td>{{$s->tanggal_sedia}}</td>
                                <td>{{$s->slot_waktu}}</td>
                                <td>{{$s->status}}</td>
                                <td>
                                    <a href="{{ route('jadwal_lapangan.edit', $s->id) }}" class="btn btn-warning" title="Edit Jadwal Lapangan">Edit</a>
                                    <form action="{{ route('jadwal_lapangan.destroy', $s->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Delete Jadwal Lapangan">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$jadwal_lapangans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
