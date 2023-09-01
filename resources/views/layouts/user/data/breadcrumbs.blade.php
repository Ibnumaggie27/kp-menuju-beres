<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3 class="text-capitalize">{{ request()->segment(3) ?? request()->segment(2)  }}</h3>
            {{-- <h6 class="text-center w-100 display-9" style="margin-top: 5px;">SMKN 1 KARANGTENGAH</h6>
            <h6 class="text-center w-100 display-9" style="margin-top: 5px;">SMKN 1 KARANGTENGAH</h6>
            <h6 class="text-center w-100 display-9" style="margin-top: 5px;">SMKN 1 KARANGTENGAH</h6> --}}
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    @foreach (request()->segments() as $index => $item)
                        @if ($item != 'backend')
                        <li class="breadcrumb-item text-capitalize">{!! $loop->last ? '' : '<a href="#">' !!} {{ $item }}</a></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>