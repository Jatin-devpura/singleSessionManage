@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function checkSession() {
        // Make an API call to check the session status
        fetch('check-session')
            .then(response => response.json())
            .then(data => {
                // Process the response data
                if (data.sessionActive) {
                    console.log('Session is active');
                } else {
                    window.location.href = '/';
                }
            })
            .catch(error => {
                console.error('Error checking session:', error);
            });
    }

    // Call checkSession every 3 seconds
    setInterval(checkSession, 3000);
</script>
@endsection
