@if (!empty($dob))
    {{{ \Carbon\Carbon::parse($dob)->diff(\Carbon\Carbon::now())->format('%y years and %m months') }}}
    @endif