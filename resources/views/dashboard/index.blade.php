@push('css')
@endpush
@extends('layouts.app')
@section('content')
    {{-- untuk role agen --}}
    @if (auth()->user()->hasRole('agen'))
        @section('title', 'Dashboard')
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
            <div class="col">
                <div class="card radius-10 bg-gradient-cosmic">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">KODE REFERRAL ANDA</p>
                                <h4 class="my-1 text-white"><span id="kode_reff">4805</span></h4>
                                <p class="mb-0 font-13 text-white">
                                    <button class="badge bg-gradient-blooker text-white shadow-sm w-100" onclick="copyToClipboard()">Salin Kode Referral</button>
                                </p>
                            </div>
                            <div id="chart1"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 bg-gradient-ibiza">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="me-auto">
                                <p class="mb-0 text-white">JUMLAH MAHASISWA</p>
                                <h4 class="my-1 text-white">$84,245</h4>
                                <p class="mb-0 font-13 text-white">&nbsp</p>
                            </div>
                            <div id="chart2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end row-->
    @endif

    {{-- untuk role user --}}
    @if (auth()->user()->hasRole('user'))
        Halaman User
    @endif
@endsection
@push('js')
    <script>
        function copyToClipboard() {
            var copyText = document.getElementById('kode_reff').innerHTML;
            var $tempCopy = $("<input>");
            $("body").append($tempCopy);
            $tempCopy.val(copyText).select();
            document.execCommand("copy");
            $tempCopy.remove();
            alert('Kode Referral Disalin')
        }
    </script>
@endpush
