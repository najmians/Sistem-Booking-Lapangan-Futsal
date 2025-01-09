@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Lapangan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lapangan.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

                                @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tipe" class="col-md-4 col-form-label text-md-end">{{ __('Tipe') }}</label>

                            <div class="col-md-6">
                                <select name="tipe" id="tipe" class="form-control @error('tipe') is-invalid @enderror">
                                    <option value="">--Pilih Tipe--</option>
                                    <option value="Rumput Sintetis">Rumput Sintetis</option>
                                    <option value="Vinyl">Vinyl</option>
                                    <option value="Parquet (Kayu)">Parquet (Kayu)</option>
                                    <option value="Semen (Beton)">Semen (Beton)</option>
                                    <option value="Aspal">Aspal</option>
                                    <option value="Karpet">Karpet</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="harga_per_jam" class="col-md-4 col-form-label text-md-end">{{ __('Harga Per Jam') }}</label>

                            <div class="col-md-6">
                                <input id="harga_per_jam" type="text" class="form-control @error('harga_per_jam') is-invalid @enderror" name="harga_per_jam" value="{{ old('harga_per_jam') }}" required autocomplete="harga_per_jam" autofocus>

                                @error('harga_per_jam')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="">--Pilih Status--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak aktif">Tidak aktif</option>
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
