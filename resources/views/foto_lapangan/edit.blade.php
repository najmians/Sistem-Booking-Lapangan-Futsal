@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Foto Lapangan Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('foto_lapangan.update', $foto_lapangan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="lapangan_id" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lapangan') }}</label>

                            <div class="col-md-6">
                                <select name="lapangan_id" id="lapangan_id" class="form-control @error('lapangan_id') is-invalid @enderror">
                                    @if ($foto_lapangan->lapangan->nama)
                                    <option value="{{ $foto_lapangan->lapangan->id }}">{{ $foto_lapangan->lapangan->nama }}</option>
                                    @endif
                                    <option value="">--Pilih Lapangan--</option>
                                    @foreach ($lapangans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ old('foto') }}" required>

                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
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
