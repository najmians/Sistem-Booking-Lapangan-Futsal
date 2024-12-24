@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Pelanggan') }}
                    <a href="{{ route('pelanggan.create') }}" class="btn btn-success" title="Edit Pelanggan">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Tlp</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pelanggans as $s)
                            <tr>
                                <td>{{$s->nama}}</td>
                                <td>{{$s->no_telp}}</td>
                                <td>
                                    <a href="{{ route('pelanggan.edit', $s->id) }}" class="btn btn-warning" title="Edit Pelanggan">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $s->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Delete Pelanggan">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$pelanggans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection