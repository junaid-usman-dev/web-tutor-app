


<!-- DIRECT CHAT -->
<div class="card direct-chat direct-chat-warning">
    <div class="card-header">
        <h3 class="card-title">Recent Chat</h3>

        <div class="card-tools">
            <span data-toggle="tooltip" title="3 New Messages"
                class="badge badge-primary">3</span>
            <button type="button" class="btn btn-tool"
                data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-toggle="tooltip"
                title="Contacts" data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i></button>

        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages" id="conversation">

            {{--Adding Conversation Partial View --}}
            @include('theme.tutor.partial.chat.conversation')
            {{--End Conversation Partial View --}}

        </div>
        <!--/.direct-chat-messages-->

        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts">
            <ul class="contacts-list">
                
                {{-- Contact List --}}
                @if ( count($contact_list) > 0)

                <input type="hidden" name="sender_id" value="{{ $user->id }}" />

                    @foreach ($contact_list as $contact)
                        <li>
                            <a href="#" name="view_conversation" data-contact_id="{{ $contact->id }}" >
                                <img class="contacts-list-img" 
                                src="{{ url('/') }}/{{ $contact->images->path }}/{{ $contact->images->name }}">

                                <div class="contacts-list-info">
                                    <span class="contacts-list-name">
                                        {{ $contact->first_name }} {{ $contact->last_name }}
                                        <small
                                            class="contacts-list-date float-right">2/28/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">How have you been? I
                                        was...</span>
                                    
                                    {{-- <input type="hidden" name="contact_id" value="{{ $contact->id }}" /> --}}

                                </div>
                                <!-- /.contacts-list-info -->
                            </a>
                        </li>
                    @endforeach
                @else
                    Your Contact List is Empty.
                @endif
                <!-- End Contact Item -->
           
            </ul>
            <!-- /.contacts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->


    {{-- Send Message Form --}}
    <div class="card-footer">
        <form id="send_message_form" accept-charset="UTF-8">
            <div class="input-group">

                @if (!empty($users_conversation[0]) )
                    <input type="hidden" name="sender_id" id="sender_id" value="{{ $user->id }}"
                        class="form-control" >
                        @php
                            if ($users_conversation[0]->sender_id != $user->id)
                            {
                                $receiver_id = $users_conversation[0]->sender_id;
                            }
                        @endphp
                    <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id }}"
                        class="form-control" >
                @endif

                <input type="text" name="message" placeholder="Type Message ..."
                    class="form-control">
                <span class="input-group-append">
                    <input type="submit" id="send_message" value="Send" class="btn btn-primary" >
                </span>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
    {{--End Send Message Form --}}


</div>
<!--/.direct-chat -->
