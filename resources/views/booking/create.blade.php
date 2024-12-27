@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create Booking') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('booking.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="pelanggan_id" class="col-md-4 col-form-label text-md-end">{{ __('Nama Pelanggan') }}</label>

                            <div class="col-md-6">
                                <select name="pelanggan_id" id="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                                    <option value="">--Pilih Pelanggan--</option>
                                    @foreach ($pelanggans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lapangan_id" class="col-md-4 col-form-label text-md-end">{{ __('Nama Lapangan') }}</label>

                            <div class="col-md-6">
                                <select name="lapangan_id" id="lapangan_id" class="form-control @error('lapangan_id') is-invalid @enderror">
                                    <option value="">--Pilih Lapangan--</option>
                                    @foreach ($lapangans as $id => $nama)
                                    <option value="{{ $id }}">{{ $nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tgl_booking" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Booking') }}</label>

                            <div class="col-md-6">
                                <input id="tgl_booking" type="date" class="form-control @error('tgl_booking') is-invalid @enderror" name="tgl_booking" value="{{ old('tgl_booking') }}" required autocomplete="tgl_booking" autofocus>

                                @error('tgl_booking')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waktu_mulai" class="col-md-4 col-form-label text-md-end">{{ __('Waktu Mulai') }}</label>

                            <div class="col-md-6">
                                <input id="waktu_mulai" type="text" class="form-control @error('waktu_mulai') is-invalid @enderror" name="waktu_mulai" value="{{ old('waktu_mulai') }}" required autocomplete="waktu_mulai" autofocus>

                                @error('waktu_mulai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="waktu_selesai" class="col-md-4 col-form-label text-md-end">{{ __('Waktu Selesai') }}</label>

                            <div class="col-md-6">
                                <input id="waktu_selesai" type="text" class="form-control @error('waktu_selesai') is-invalid @enderror" name="waktu_selesai" value="{{ old('waktu_selesai') }}" required autocomplete="waktu_selesai" autofocus>

                                @error('waktu_selesai')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="total_harga" class="col-md-4 col-form-label text-md-end">{{ __('Total Harga') }}</label>

                            <div class="col-md-6">
                                <input id="total_harga" type="text" class="form-control @error('total_harga') is-invalid @enderror" name="total_harga" value="{{ old('total_harga') }}" required autocomplete="total_harga" autofocus>

                                @error('total_harga')
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
                                    <option value="pending">Pending</option>
                                    <option value="confirmed">Konfirmasi</option>
                                    <option value="canceled">Batal</option>
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
