@extends('layouts.backend.app')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Kandidat</h6>
                            <h6 class="font-extrabold mb-0">{{ $data['kandidat'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldProfile"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Pemilih</h6>
                            <h6 class="font-extrabold mb-0">{{ $data['pemilih'] }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-boldTick-Square"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Sudah Memilih</h6>
                            <h6 class="font-extrabold mb-0" id="sudah_milih">Loading</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-boldDanger"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Belum Memilih</h6>
                            <h6 class="font-extrabold mb-0" id="belum_milih">Loading</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Hasil Pilkosis</h4>
                </div>
                <div class="card-body">
                    <div id="chartHasil"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('mazer') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script>
      function chartHasil(data) {
  $('#chartHasil').empty();

  var series = data.map(item => ({
    name: item.name,
    data: [item.jumlah]
  }));

  var optionsChartHasil = {
    chart: {
      type: "bar",
      height: 300,
    },
    series: series,
    colors: ["#008FFB", "#00E396", "#FEB019", "#FF4560", "#B8FF45", "#45BCFF"],
    xaxis: {
      categories: ["Kandidat"],
    },
    title: {
    text: "Grafik Hasil Pemilihan",
    align: "center",
    style: {
      fontSize: "18px",
      color: "#333"
    }
  }
  };

  var chartHasil = new ApexCharts(
    document.querySelector("#chartHasil"),
    optionsChartHasil
  );
  chartHasil.render();
}

    $(document).ready(function() {
      // Data dummy (contoh)
      var dataDummy = [
        { name: "Kandidat A", jumlah: 200 },
        { name: "Kandidat B", jumlah: 300 },
        { name: "Kandidat C", jumlah: 150 },
        { name: "Kandidat D", jumlah: 400 },
      ];

      chartHasil(dataDummy);
    });


// Sisanya tetap sama seperti sebelumnya

        function getData() {
            $('#sudah_milih').text('Loading');
            $('#belum_milih').text('Loading');
            $.ajax({
                url: '{{ route('backend.dashboard.ajax') }}',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#sudah_milih').text(data.pemilih_done);
                    $('#belum_milih').text(data.pemilih_pending);
                    chartHasil(data.hasil)
                }
            });
        }
        $(document).ready(function() {
            getData();
        });
    </script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <script>
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('af07d1c595ed832e1eaf', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('voting-channel');
        channel.bind('voting-event', function(data) {
            getData();
            var message = JSON.stringify(data)
            Toastify({
                text: data.message,
                duration: 3000,
                close: true,
                gravity: "top",
                position: "right",
                backgroundColor: "#4fbe87",
            }).showToast()
        });
    </script>
@endpush
