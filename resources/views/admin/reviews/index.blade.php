@extends('layouts.admin')

@section('page-title')
    {{ __('Manage Reviews') }}
@endsection

@section('multiple-action-button')
    <div class="row justify-content-end">
        <div class="col-auto">
            
            <div class="btn btn-sm btn-primary btn-icon m-1 ms-2" data-bs-toggle="tooltip" data-bs-placement="top"
                title="{{ __('Export Tickets CSV file') }}">
                <a href="{{ route('reviews.export') }}" class=""><i class="ti ti-file-export text-white"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body table-border-style">
                    <div class="table-responsive">
                        <table id="pc-dt-simple" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th>{{ __('Ticket ID') }}</th>
                                    <th class="w-10">{{ __('Student Name') }}</th>
                                    <th class="w-10">{{ __('Student Email') }}</th>
                                    <th>{{ __('Rating') }}</th>
                                    <th>{{ __('Comment') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td class="Id sorting_1">
                                            <a class="btn btn-outline-primary" href="{{ route('admin.tickets.edit', $review->ticket->id) }}">
                                                {{ $review->ticket->ticket_id }}
                                            </a>
                                        </td>
                                        <td><span class="white-space">{{ $review->ticket->name }}</span></td>
                                        <td><span class="white-space">{{ $review->ticket->email }}</span></td>
                                         <td style="color: #FF9600;; font-size: 20px;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <span style="margin-right: 2px;">@if ($i <= $review->rating) &#9733; @else &#9734; @endif</span>
                                            @endfor
                                        </td>
                                        <td><span class="white-space">{{ $review->comment }}</span></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection