@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Kategori Lapangan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('kategori.update', $kategori->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="nama_kategori" class="col-md-4 col-form-label text-md-end">{{ __('Nama Kategori') }}</label>

                            <div class="col-md-6">
                                <select name="nama_kategori" id="tipe" class="form-control @error('nama_kategori') is-invalid @enderror">
                                <option value="">--Pilih Kategori--</option>
                                <option value="Indoor">Indoor</option>
                                <option value="Outdoor">Outdoor</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi') }}</label>

                            <div class="col-md-6">
                                <select name="deskripsi" id="tipe" class="form-control @error('deskripsi') is-invalid @enderror">
                                <option value="">--Pilih Deskripsi--</option>
                                <option value="Lapangan Dalam Ruangan">Lapangan Dalam Ruangan</option>
                                <option value="Lapangan Luar Ruangan">Lapangan Luar Ruangan</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
