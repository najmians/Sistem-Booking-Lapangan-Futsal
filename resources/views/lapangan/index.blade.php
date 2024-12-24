@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Lapangan') }}
                    <a href="{{ route('lapangan.create') }}" class="btn btn-success" title="Buat Lapangan">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Tipe</th>
                                <th>Harga Per Jam</th>
                                <th>Status</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lapangans as $s)
                            <tr>
                                <td>{{$s->nama}}</td>
                                <td>{{$s->tipe}}</td>
                                <td>{{$s->harga_per_jam}}</td>
                                <td>{{$s->status}}</td>
                                <td>
                                    <a href="{{ route('lapangan.edit', $s->id) }}" class="btn btn-warning" title="Edit Lapangan">Edit</a>
                                    <form action="{{ route('lapangan.destroy', $s->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Delete Lapangan">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$lapangans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
