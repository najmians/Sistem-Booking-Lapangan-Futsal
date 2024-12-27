@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Jadwal Lapangan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('jadwal_lapangan.update', $jadwal_lapangan->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="lapangan_id" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lapangan') }}</label>

                            <div class="col-md-6">
                                <select name="lapangan_id" id="lapangan_id" class="form-control @error('lapangan_id') is-invalid @enderror">
                                    @if ($jadwal_lapangan->lapangan->nama)
                                    <option value="{{ $jadwal_lapangan->lapangan->id }}">{{ $jadwal_lapangan->lapangan->nama }}</option>
                                    @endif
                                    <option value="">--Pilih Lapangan--</option>
                                    @foreach ($lapangans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_sedia" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Sedia') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_sedia" type="date" class="form-control @error('tanggal_sedia') is-invalid @enderror" name="tanggal_sedia" value="{{ old('tanggal_sedia') ?? $jadwal_lapangan->tanggal_sedia }}" required autocomplete="tanggal_sedia" autofocus>
                                @error('tanggal_sedia')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="slot_waktu" class="col-md-4 col-form-label text-md-end">{{ __('Slot Waktu') }}</label>

                            <div class="col-md-6">
                                <input id="slot_waktu" type="text" class="form-control @error('slot_waktu') is-invalid @enderror" name="slot_waktu" value="{{ old('slot_waktu') ?? $jadwal_lapangan->slot_waktu }}" required autocomplete="slot_waktu" autofocus>

                                @error('slot_waktu')
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
                                    <option value="Ada">Ada</option>
                                    <option value="Kosong">Kosong</option>
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
