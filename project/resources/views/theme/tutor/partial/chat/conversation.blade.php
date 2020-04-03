

@foreach ($users_conversation as $messenger)
@if ($messenger->sender_id != $user->id)
    <!-- Message. Default to the left -->
    {{-- @php
        $receiver_id = $messenger->users->id;
    @endphp --}}
    <div class="direct-chat-msg">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">{{ $messenger->users->first_name }}
                {{ $messenger->users->last_name }}</span>
            <span class="direct-chat-timestamp float-right">{{ \Carbon\Carbon::parse($messenger->created_at)->format('d M g:i A') }}</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img"
            src="{{ url('/') }}/{{ $messenger->users->images->path }}/{{ $messenger->users->images->name }}"
            alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            {{ $messenger->text }}
        </div>
        <!-- /.direct-chat-text -->
    </div>
@else
    <!-- Message to the right -->
    <div class="direct-chat-msg right">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-right">{{ $messenger->users->first_name }} {{ $messenger->users->last_name }}</span>
            <span class="direct-chat-timestamp float-left">{{ \Carbon\Carbon::parse($messenger->created_at)->format('d M g:i A') }}</span>
        </div>
        <!-- /.direct-chat-infos -->
        <img class="direct-chat-img"
            src="{{ url('/') }}/{{ $messenger->users->images->path }}/{{ $messenger->users->images->name }}"
            alt="message user image">
        <!-- /.direct-chat-img -->
        <div class="direct-chat-text">
            {{ $messenger->text }}
        </div>
        <!-- /.direct-chat-text -->
    </div>
    <!-- /.direct-chat-msg -->
@endif
@endforeach