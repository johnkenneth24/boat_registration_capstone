@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <x-success></x-success>
                    <div class="card  card-outline card-warning mt-5">
                        <div class="card-header">
                            <div class="card-title">
                                <h4>Reports</h4>
                            </div>
                            <div class="card-tools d-flex justify-content-between">
                                @livewire('reports.export')
                                {{--  --}}
                            </div>
                        </div>
                        <div class="card-body p-0">
                            @if (session()->has('message'))
                                <div class="alert alert-success">{{ session('message') }}</div>
                            @endif
                            <table class="table table-sm table-hover">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Registration No.</th>
                                        <th>Registration Date</th>
                                        <th>Vessel Name</th>
                                        <th>Owner Name</th>
                                        <th class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reports as $report)
                                        <tr
                                            class="@if ($report->status == 'registered' && \Carbon\Carbon::parse($report->approved_at)->endOfYear() < \Carbon\Carbon::now()) bg-danger @elseif($report->status == 'registered') bg-success @elseif($report->status == 'pending') bg-warning @elseif($report->status == 'disapproved') bg-danger @endif">
                                            <td>{{ $report->registration_no }}</td>
                                            <td>{{ date('F d, Y', strtotime($report->registration_date)) }}</td>
                                            <td>{{ $report->boat->vessel_name }}</td>
                                            <td>{{ $report->ownerInfo->fullname }}</td>
                                            <td class="text-center">
                                                @if ($report->status == 'registered')
                                                    @if (\Carbon\Carbon::parse($report->approved_at)->endOfYear() < \Carbon\Carbon::now())
                                                        Expired
                                                    @else
                                                        {{ ucFirst($report->status) }}
                                                    @endif
                                                @elseif ($report->status == 'pending')
                                                    {{ ucFirst($report->status) }}
                                                @elseif ($report->status == 'disapproved')
                                                    {{ ucFirst($report->status) }}
                                                @endif
                                            </td>
                                        </tr>

                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">No Data</td>
                                        </tr>
                                    @endforelse

                                </tbody>

                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            {{ $reports->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
