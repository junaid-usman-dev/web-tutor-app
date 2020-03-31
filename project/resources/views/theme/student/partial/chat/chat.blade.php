

<!-- DIRECT CHAT -->
<div class="card direct-chat direct-chat-warning">
    <div class="card-header">
        {{-- @if ( count($users_conversation) > 0) --}}
        {{-- {{ $user->id }} --}}
            {{-- @if ( $users_conversation[0]->sender_id == $user->id ) --}}

                <h3 class="card-title">Recent Chat [  ]</h3>

            {{-- @endif --}}
            {{-- <h3 class="card-title">Recent Chat [ {{ $users_conversation[0]->users->first_name }} ]</h3> --}}
        {{-- @else --}}
            {{-- <h3 class="card-title">Recent Chat</h3> --}}
        {{-- @endif --}}

        <div class="card-tools">
            <span data-toggle="tooltip" title="3 New Messages"
                class="badge badge-primary">3</span>
            <button type="button" class="btn btn-tool"
                data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" id="contact_list" class="btn btn-tool" data-toggle="tooltip"
                title="Contacts" data-widget="chat-pane-toggle">
                <i class="fas fa-comments"></i></button>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- Conversations are loaded here -->
        <div class="direct-chat-messages" id="conversation">

            {{-- Conversation Partial View --}}
            @include('theme.student.partial.chat.conversation')
            



            <!-- Message. Default to the left -->
            {{-- <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Alexander
                        Pierce</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 2:00
                        pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img"
                    src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}"
                    alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Is this template really for free? That's unbelievable!
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        
            <!-- Message to the right -->
            <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 2:05
                        pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img"
                    src="{{ asset('theme_asset/dist/img/user3-128x128.jpg') }}"
                    alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    You better believe it!
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-left">Alexander
                        Pierce</span>
                    <span class="direct-chat-timestamp float-right">23 Jan 5:37
                        pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img"
                    src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}"
                    alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    Working with StudentLynx on a great new app! Wanna join?
                </div>
                <!-- /.direct-chat-text -->
            </div> --}}
            <!-- /.direct-chat-msg -->
        
            {{-- <!-- Message to the right -->
            <div class="direct-chat-msg right">
                <div class="direct-chat-infos clearfix">
                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                    <span class="direct-chat-timestamp float-left">23 Jan 6:10
                        pm</span>
                </div>
                <!-- /.direct-chat-infos -->
                <img class="direct-chat-img"
                    src="{{ asset('theme_asset/dist/img/user3-128x128.jpg') }}"
                    alt="message user image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    I would love to.
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg --> --}}
        </div>
        <!--/.direct-chat-messages-->



        <!-- Contacts are loaded here -->
        <div class="direct-chat-contacts" >
            <ul class="contacts-list">

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
                
                {{-- <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user1-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Count Dracula
                                <small
                                    class="contacts-list-date float-right">2/28/2015</small>
                            </span>
                            <span class="contacts-list-msg">How have you been? I
                                was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user7-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Sarah Doe
                                <small
                                    class="contacts-list-date float-right">2/23/2015</small>
                            </span>
                            <span class="contacts-list-msg">I will be waiting
                                for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user3-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Nadia Jolie
                                <small
                                    class="contacts-list-date float-right">2/20/2015</small>
                            </span>
                            <span class="contacts-list-msg">I'll call you back
                                at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user5-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Nora S. Vans
                                <small
                                    class="contacts-list-date float-right">2/10/2015</small>
                            </span>
                            <span class="contacts-list-msg">Where is your
                                new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user6-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                John K.
                                <small
                                    class="contacts-list-date float-right">1/27/2015</small>
                            </span>
                            <span class="contacts-list-msg">Can I take a look
                                at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
                <li>
                    <a href="#">
                        <img class="contacts-list-img"
                            src="{{ asset('theme_asset/dist/img/user8-128x128.jpg') }}">

                        <div class="contacts-list-info">
                            <span class="contacts-list-name">
                                Kenneth M.
                                <small
                                    class="contacts-list-date float-right">1/4/2015</small>
                            </span>
                            <span class="contacts-list-msg">Never mind I
                                found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li> --}}
                <!-- End Contact Item -->
            </ul>
            <!-- /.contacts-list -->
        </div>
        <!-- /.direct-chat-pane -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <form id="send_message_form" accept-charset="UTF-8">
            {{-- @csrf --}}
            <div class="input-group">
                @if (!empty($users_conversation[0]) )
                    <input type="hidden" name="sender_id" id="sender_id" value="{{ $user->id }}"
                    class="form-control" >
                    @php
                        if ($users_conversation[0]->receiver_id != $user->id)
                        {
                            $receiver_id = $users_conversation[0]->receiver_id;
                            // $receiver_id = $users_conversation[0]->receiver_id;
                        }
                    @endphp
                    <input type="hidden" name="receiver_id" id="receiver_id" value="{{ $receiver_id }}"
                        class="form-control" >
                @endif
                
                <input type="text" name="message" id="message" placeholder="Type Message ..."
                    class="form-control" >
                <span class="input-group-append">
                    <input type="submit" id="send_message" value="Send" class="btn btn-primary" >
                    {{-- <input type="submit"  value="Send"/> --}}
                </span>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
</div>
<!--/.end direct-chat -->



