@extends('admin.layouts.main')
@section('title', 'Data Pemasukan')
@section('content')

<div class="container-fluid">
    <div class="row mt-4">
        <div class="col">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-start align-items-sm-center">
                <h4 class="mb-3 mb-sm-0">Data Pemasukan</h4>
                <div class="d-flex flex-column flex-sm-row">
                    <select id="monthSelect" class="form-control form-control-sm mb-2 mb-sm-0 mr-sm-2" onchange="filterTable()">
                        <option value="">Pilih Bulan</option>
                        @foreach($months as $month)
                            @php
                                $monthFormatted = str_pad($month, 2, '0', STR_PAD_LEFT);
                                $monthName = \Carbon\Carbon::createFromFormat('m', $monthFormatted)->locale('id')->translatedFormat('F');
                            @endphp
                            <option value="{{ $monthFormatted }}" {{ $selectedMonth == $monthFormatted ? 'selected' : '' }}>
                                {{ $monthName }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bulan</th>
                            <th>Pemasukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($selectedMonth)
                            @if($pemasukanForSelectedMonth > 0)
                                @php
                                    $monthName = \Carbon\Carbon::createFromFormat('m', $selectedMonth)->locale('id')->translatedFormat('F');
                                @endphp
                                <tr>
                                    <td>1</td>
                                    <td>{{ $monthName }}</td>
                                    <td>Rp. {{ number_format($pemasukanForSelectedMonth, 0, ',', '.') }}</td>
                                </tr>
                            @else
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada pemasukan untuk bulan ini.</td>
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td colspan="3" class="text-center">Silakan pilih bulan untuk melihat data pemasukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function filterTable() {
        const selectedMonth = document.getElementById('monthSelect').value;
        window.location.href = `{{ route('datapemasukan') }}?month=${selectedMonth}`;
    }
</script>

@endsection
