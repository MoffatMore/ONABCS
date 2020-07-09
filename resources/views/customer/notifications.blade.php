@extends('layouts.customer-default')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Notifications
                </div>

                <div class="card-body">
                    @if(session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if(auth()->user()->roles()->first() != null)
                    @forelse($notifications as $notification)
                    <div class="alert alert-success" role="alert">
                        [{{ $notification->created_at }}] Request to fix {{ $notification->data['name'] }}  has been  {{ $notification->data['status'] }}.
                        <a href="#" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                            Mark as read
                        </a>
                    </div>

                    @if($loop->last)
                    <a href="#" id="mark-all">
                        Mark all as read
                    </a>
                    @endif
                    @empty
                    There are no new notifications
                    @endforelse
                    @else
                    You are logged in!
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
@if(auth()->user()->is_admin)
<script>
    function sendMarkRequest(id = null) {
        return $.ajax("{{ route('customer.markNotification') }}", {
            method: 'POST',
            data: {
                _token,
                id
            }
        });
    }

    $(function() {
        $('.mark-as-read').click(function() {
            let request = sendMarkRequest($(this).data('id'));

            request.done(() => {
                $(this).parents('div.alert').remove();
            });
        });

        $('#mark-all').click(function() {
            let request = sendMarkRequest();

            request.done(() => {
                $('div.alert').remove();
            })
        });
    });
</script>
@endif
@endsection
