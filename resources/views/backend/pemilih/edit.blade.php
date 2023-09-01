@extends('layouts.backend.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-title"> {{ __('button.edit') }} {{ __('pemilih') }}</h4>
            <div class="card-header-action">
                <a href="{{ route('backend.pemilih.index') }}" class="btn btn-secondary">{{ __('button.back') }}</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.pemilih.update',$data['user']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <x-forms.input :label="__('field.voter_nis')" name="email" id="email" isRequired="true"  :value="$data['user']['email']" />
                <x-forms.input :label="__('field.voter_name')" name="name" id="name" isRequired="true"  :value="$data['user']['name']"/>
                <x-forms.input :label="__('field.voter_jurusan')" name="jurusan" id="jurusan" isRequired="true"  :value="$data['user']['jurusan']"/>
                <x-forms.input :label="__('field.voter_kelas')" name="kelas" id="kelas" isRequired="true"  :value="$data['user']['kelas']"/>
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">{{ __('button.save') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
