@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Foto Lapangan') }}
                    <a href="{{ route('foto_lapangan.create') }}" class="btn btn-success" title="Buat Foto Lapangan">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Lapangan</th>
                                <th>Foto</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($foto_lapangans as $s)
                            <tr>
                                <td>{{$s->lapangan?->nama}}</td>
                                <td><img src="/storage/{{$s->foto}}" width="50" height="50" alt=""></td>
                                <td>
                                    <a href="{{ route('foto_lapangan.edit', $s->id) }}" class="btn btn-warning" title="Edit Foto Lapangan">Edit</a>
                                    <form action="{{ route('foto_lapangan.destroy', $s->id) }}" method="POST"
                                        style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" title="Delete Foto Lapangan">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$foto_lapangans->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
