@extends('front.layouts.master')

@section('sub-css')
<style>
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%;
        border-right: 1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
    }
    .top_spac {
        margin: 20px 0 0;
    }

    .recent_heading {
        float: left;
        width: 40%;
    }
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%;
    }
    .headind_srch {
        padding: 10px 29px 10px 20px;
        overflow: hidden;
        border-bottom: 1px solid #c4c4c4;
    }

    .recent_heading h4 {
        color: #e91482;
        font-size: 21px;
        margin: auto;
    }
    
    .chat_ib h5 {
        font-size: 15px;
        color: #464646;
        margin: 0 0 8px 0;
    }
    .chat_ib h5 span {
        font-size: 13px;
        float: right;
    }
    .chat_ib p {
        font-size: 14px;
        color: #989898;
        margin: auto;
    }
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people {
        overflow: hidden;
        clear: both;
    }
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
        cursor: pointer;
    }
    .inbox_chat {
        height: 550px;
        overflow-y: scroll;
    }

    .active_chat {
        background: #ebebeb;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg {
        width: 57%;
    }
    .mesgs {
        float: left;
        padding: 30px 15px 0 25px;
        width: 60%;
    }

    .sent_msg p {
        background: #e91482 none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #fff;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .outgoing_msg {
        overflow: hidden;
        margin: 26px 0 26px;
    }
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 100%;
    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }
    .msg_send_btn {
        background: #e91482 none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging {
        padding: 0 0 50px 0;
    }
    .msg_history {
        height: 250px;
        overflow-y: auto;
    }

</style>
@endsection

@section('dashboard-content')
<div class="col-12 col-md-9 pl-2 pl-md-5 rightpart">
    <div class="row mb-3 dashboard align-items-center">
    </div>
    <div class="row m-0 dashboard align-items-center">
        <div class="table-responsive bg-white">
            <table id="customDataTable" class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th>User</th>
                    <th scope="col">Message</th>
                    <th scope="col">View</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($data as $key => $item)
                <tr>
                    <input type="hidden" id="logged_in_id" value="{{auth()->guard(get_guard())->user()->id}}">
                    <td>{{$key+1}}</td>
                    <td>{{$item->opponent->name}}</td>
                    <td>
                        <strong>{{$item->last_message->message}}</strong> <br>
                        <small>{{$item->last_message->created_at->diffForHumans()}}</small>
                    </td>
                    <td><a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" id="{{$item->id}}" onclick="getMessages(this.id)"><i class="fas fa-eye"></i></a></td>
                </tr>
				@endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Messages</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="message_details"></div>
                    <div class="m-3" id="message_send_form"></div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection

@section('sub-script')
    
<script>
    function getMessages(id) {
        $("div.chat_list").removeClass("active_chat");
        $("div.chat_list."+id).addClass("active_chat");
        $.ajax({
            url: "{{route('get.messages.by.id')}}",
            type: 'POST',
            data: {
                '_token' : "{{csrf_token()}}",
                'conversation_id' : id
            },
            success:function(data) {
                // console.log(data.data);
                $('#message_details').empty();
                $('#message_send_form').empty();
                var msg_history = '<div class="msg_history">';
                var type_msg = '';
                $.each(data.data, function(i, val) {
                    if ($('#logged_in_id').val() == val.from_id) {
                        msg_history += '<div class="outgoing_msg"><div class="sent_msg"><p>'+val.message+'</p><span class="time_date"> '+val.time+'</span> </div></div>';
                    } else {
                        msg_history += '<div class="incoming_msg">';
                        // msg_history += '<div class="incoming_msg_img">'; 
                        // if (val.userDetails.image == '') {
                        //     msg_history += "<img src={{asset('design/images/mentor1.jpg')}}></div>";
                        // } else {
                        //     msg_history += "<img src='{{asset('')}}/'"+val.userDetails.image+"></div>";
                        // }
                        msg_history +='<div class="received_msg"><div class="received_withd_msg"><p>'+val.message+'</p><span class="time_date"> '+val.time+'</span></div></div></div>';
                        msg_history += '<input type="hidden" id="receiverId" value="'+val.from_id+'">';
                        msg_history += '<input type="hidden" id="conversationId" value="'+val.conversation_id+'">';
                    }
                })
                msg_history += '</div>';
                type_msg += "<div class='type_msg'><div class='input_msg_write'><form id='sendMessageForm'><input type='text' class='write_msg' placeholder='Type a message' id='my_message' value=''/><button class='msg_send_btn' type='submit'><i class='fa fa-paper-plane'></i></button></form></div></div>";
                $('#message_details').append(msg_history);
                $('#message_send_form').append(type_msg);
            }
        })
    };

    $(document).on('submit','#sendMessageForm',function(evt){
        var conversationId = $('#conversationId').val();
        evt.preventDefault();
        $.ajax({
            url: "{{route('send.message.universal')}}",
            type: "POST",
            data: {
                '_token': '{{csrf_token()}}',
                'receiverId': $('#receiverId').val(),
                'senderId': $('#logged_in_id').val(),
                'message': $('#my_message').val(),
            },
            success:function(data) {
                $('#sendMessageForm').trigger("reset");
                // alert(data.message);
                getMessages(conversationId);
            }
        })
    });
</script>

@endsection