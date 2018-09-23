@if (session('success'))
    @include('messages.success')
  @elseif(session('warning'))
    @include('messages.warning')
  @elseif(session('error'))
    @include($message == 'messages.error')
@endif
