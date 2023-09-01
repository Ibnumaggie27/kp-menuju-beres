@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title"> {{ __('button.add') }} {{ __('Pemilih') }}</h4>
            <div class="card-header-action">
                <a href="{{ route('backend.pemilih.index') }}}" class="btn btn-secondary">{{ __('button.back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.pemilih.store') }}" method="post">
                @csrf
               
                <x-forms.input :label="__('field.voter_nis')" name="email" id="email" isRequired="true" />
                <x-forms.input :label="__('field.voter_name')" name="name" id="name" isRequired="true" />
                <x-forms.input :label="__('field.voter_jurusan')" name="jurusan" id="jurusan" isRequired="true" />
                <x-forms.input :label="__('field.voter_kelas')" name="kelas" id="kelas" isRequired="true" />
                <div class="text-end">
                <button type="button" class="btn btn-success px-4 gap-3" data-bs-toggle="modal" data-bs-target="#importModal">import Excel</button>
                    <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal import -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Masukan Data Pemilih</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route ('backend.pemilih.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="">pilih file</label>
                <input type="file" class="form-control" name="file">
            </div>
            <button class="btn btn-success" type="submit">Import</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
