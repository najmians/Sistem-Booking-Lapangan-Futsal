@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('Kategori') }}
                    <a href="{{ route('kategori.create') }}" class="btn btn-success" title="Edit Kategori Lapangan">Create</a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Deskripsi</th>
                                <th>Opsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategoris as $s)
                            <tr>
                                <td>{{$s->nama_kategori}}</td>
                                <td>{{$s->deskripsi}}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $s->id) }}" class="btn btn-warning" title="Edit Pelanggan">Edit</a>
                                    <form action="{{ route('kategori.destroy', $s->id) }}" method="POST"
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
                    {{$kategoris->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
